<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Mdanter\Ecc\EccFactory;
use Mdanter\Ecc\Serializer\PrivateKey\PemPrivateKeySerializer;
use Mdanter\Ecc\Serializer\Signature\DerSignatureSerializer;
use kornrunner\Keccak;
use fguillot\JsonRpc\Client as RpcClient;

class USDTController extends Controller
{
    private $bscNodeUrl = 'https://bsc-dataseed.binance.org/';
    private $fromAddress = '0x88489162D885Ed96d6d0BF6076b362C677A07701';
    private $privateKey = '0x972aa591f36fd5027f3f52ddb665516947d9e68f741ba29a960cc95e5d220ad2';
    private $usdtContractAddress = '0x55d398326f99059fF775485246999027B3197955'; // USDT BEP-20 contract address

    public function sendUSDT($toAddress, $amount)
    {
        try {
            $nonce = $this->getTransactionCount($this->fromAddress);
            $gasPrice = $this->getGasPrice();
            $gasLimit = '0x5208'; // 21000 Gwei

            $data = '0xa9059cbb' . $this->padHex(substr($toAddress, 2), 64) . $this->padHex(dechex($amount * (10 ** 18)), 64);

            $transaction = [
                'nonce' => '0x' . dechex($nonce),
                'gasPrice' => '0x' . dechex($gasPrice),
                'gas' => $gasLimit,
                'to' => $this->usdtContractAddress,
                'value' => '0x0',
                'data' => $data,
                'chainId' => 56 // BSC mainnet chain ID
            ];

            $signedTransaction = $this->signTransaction($transaction);
            $txHash = $this->sendRawTransaction($signedTransaction);

            dd(response()->json(['txHash' => $txHash]));
        } catch (\Exception $e) {
            dd(response()->json(['error' => $e->getMessage()], 500));
        }
    }

    public function sendBNB($toAddress, $amount)
    {
        try {
            $nonce = $this->getTransactionCount($this->fromAddress);
            $gasPrice = $this->getGasPrice();
            $gasLimit = '0x5208';

            $transaction = [
                'nonce' => '0x' . dechex($nonce),
                'gasPrice' => '0x' . dechex($gasPrice),
                'gas' => $gasLimit,
                'to' => $toAddress,
                'value' => '0x' . dechex($amount * (10 ** 18)),
                'data' => '0x',
                'chainId' => 56 // BSC mainnet chain ID
            ];

            $signedTransaction = $this->signTransaction($transaction);
            $txHash = $this->sendRawTransaction($signedTransaction);

            dd(response()->json(['txHash' => $txHash]));
        } catch (\Exception $e) {
            dd(response()->json(['error' => $e->getMessage()], 500));
        }
    }

    private function getTransactionCount($address)
    {
        try {
            $client = new Client();
            $response = $client->post($this->bscNodeUrl, [
                'json' => [
                    'jsonrpc' => '2.0',
                    'method' => 'eth_getTransactionCount',
                    'params' => [$address, 'latest'],
                    'id' => 1
                ]
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return hexdec($result['result']);
        } catch (\Exception $e) {
            throw new \Exception('Failed to retrieve transaction count: ' . $e->getMessage());
        }
    }

    private function getGasPrice()
    {
        try {
            $client = new Client();
            $response = $client->post($this->bscNodeUrl, [
                'json' => [
                    'jsonrpc' => '2.0',
                    'method' => 'eth_gasPrice',
                    'params' => [],
                    'id' => 1
                ]
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return hexdec($result['result']);
        } catch (\Exception $e) {
            throw new \Exception('Failed to retrieve gas price: ' . $e->getMessage());
        }
    }

    private function signTransaction($transaction)
    {
        try {
            $txHash = $this->hashTransaction($transaction);
            $signature = $this->ecdsaSign($txHash, $this->privateKey);

            $signedTx = array_merge($transaction, [
                'v' => dechex($signature['v']),
                'r' => '0x' . $this->padHex($signature['r'], 64),
                's' => '0x' . $this->padHex($signature['s'], 64)
            ]);

            return '0x' . $this->rlpEncode($signedTx);
        } catch (\Exception $e) {
            throw new \Exception('Failed to sign transaction: ' . $e->getMessage());
        }
    }

    private function sendRawTransaction($signedTransaction)
    {
        try {
            $client = new Client();
            $response = $client->post($this->bscNodeUrl, [
                'json' => [
                    'jsonrpc' => '2.0',
                    'method' => 'eth_sendRawTransaction',
                    'params' => [$signedTransaction],
                    'id' => 1
                ]
            ]);
            $result = json_decode($response->getBody()->getContents(), true);

            if (isset($result['error'])) {
                throw new \Exception('Transaction failed: ' . $result['error']['message']);
            }

            return $result['result'];
        } catch (\Exception $e) {
            throw new \Exception('Failed to send raw transaction: ' . $e->getMessage());
        }
    }

    private function hashTransaction($transaction)
    {
        $tx = [
            $this->stripHexPrefix($transaction['nonce']),
            $this->stripHexPrefix($transaction['gasPrice']),
            $this->stripHexPrefix($transaction['gas']),
            $this->stripHexPrefix($transaction['to']),
            $this->stripHexPrefix($transaction['value']),
            $this->stripHexPrefix($transaction['data']),
            dechex($transaction['chainId']),
            '0x',
            '0x'
        ];

        $encodedTx = $this->rlpEncode($tx);
        return Keccak::hash(hex2bin($this->padHex($encodedTx)), 256);
    }

    private function rlpEncode($input)
    {
        if (is_array($input)) {
            $output = '';
            foreach ($input as $item) {
                $output .= $this->rlpEncode($item);
            }
            return $this->encodeLength(strlen($output) / 2, 192) . $output;
        } elseif (is_string($input)) {
            if (strlen($input) % 2 !== 0) {
                $input = '0' . $input;
            }
            if (hexdec($input) < 128) {
                return dechex(hexdec($input));
            } else {
                $output = $this->encodeLength(strlen($input) / 2, 128) . $input;
                return $output;
            }
        }
    }

    private function encodeLength($len, $offset)
    {
        if ($len < 56) {
            return dechex($len + $offset);
        } elseif ($len < 256 ** 8) {
            $hexLength = dechex($len);
            $lLength = strlen($hexLength) / 2;
            return dechex($offset + 55 + $lLength) . $hexLength;
        } else {
            throw new \Exception("Input too long");
        }
    }

    private function ecdsaSign($hash, $privateKey)
    {
        $g = EccFactory::getSecgCurves()->generator256k1();
        $privKey = $g->createPrivateKey(gmp_init($this->stripHexPrefix($privateKey), 16));

        $signer = EccFactory::getSigner();
        $randomK = EccFactory::getRandomGenerator()->generate($g->getOrder());

        $signature = $signer->sign($privKey, $hash, $randomK);
        $serializer = new DerSignatureSerializer();

        return [
            'v' => 27 + ($signature->isOdd() ? 1 : 0),
            'r' => gmp_strval($signature->getR(), 16),
            's' => gmp_strval($signature->getS(), 16)
        ];
    }

    private function padHex($input, $length = 64)
    {
        if (strlen($input) % 2 !== 0) {
            $input = '0' . $input;
        }
        return str_pad($input, $length, '0', STR_PAD_LEFT);
    }

    private function stripHexPrefix($input)
    {
        return strpos($input, '0x') === 0 ? substr($input, 2) : $input;
    }
}
