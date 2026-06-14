<!doctype html>
<html lang="en-US" data-bs-theme="dark">
<?php
$page = 'all';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-adsense-account" content="ca-pub-6586185621941206">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <title>GWI</title>
    <meta name="robots" content="max-image-preview:large">
    <link rel="alternate" type="application/rss+xml" title="Bitrader &raquo; Feed" href="/dark/feed/">
    <link rel="alternate" type="application/rss+xml" title="Bitrader &raquo; Comments Feed" href="/dark/comments/feed/">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6586185621941206" crossorigin="anonymous"></script>
    <script type="text/javascript">
        /* <![CDATA[ */
        window._wpemojiSettings = {
            "baseUrl": "https:\/\/s.w.org\/images\/core\/emoji\/15.0.3\/72x72\/"
            , "ext": ".png"
            , "svgUrl": "https:\/\/s.w.org\/images\/core\/emoji\/15.0.3\/svg\/"
            , "svgExt": ".svg"
            , "source": {
                "concatemoji": "https:\/\/bitrader.thetork.com\/dark\/wp-includes\/js\/wp-emoji-release.min.js?ver=6.5.2"
            }
        };
        /*! This file is auto-generated */
        ! function(i, n) {
            var o, s, e;

            function c(e) {
                try {
                    var t = {
                        supportTests: e
                        , timestamp: (new Date).valueOf()
                    };
                    sessionStorage.setItem(o, JSON.stringify(t))
                } catch (e) {}
            }

            function p(e, t, n) {
                e.clearRect(0, 0, e.canvas.width, e.canvas.height), e.fillText(t, 0, 0);
                var t = new Uint32Array(e.getImageData(0, 0, e.canvas.width, e.canvas.height).data)
                    , r = (e.clearRect(0, 0, e.canvas.width, e.canvas.height), e.fillText(n, 0, 0), new Uint32Array(e
                        .getImageData(0, 0, e.canvas.width, e.canvas.height).data));
                return t.every(function(e, t) {
                    return e === r[t]
                })
            }

            function u(e, t, n) {
                switch (t) {
                    case "flag":
                        return n(e, "\ud83c\udff3\ufe0f\u200d\u26a7\ufe0f", "\ud83c\udff3\ufe0f\u200b\u26a7\ufe0f") ? !1 : !
                            n(e, "\ud83c\uddfa\ud83c\uddf3", "\ud83c\uddfa\u200b\ud83c\uddf3") && !n(e
                                , "\ud83c\udff4\udb40\udc67\udb40\udc62\udb40\udc65\udb40\udc6e\udb40\udc67\udb40\udc7f"
                                , "\ud83c\udff4\u200b\udb40\udc67\u200b\udb40\udc62\u200b\udb40\udc65\u200b\udb40\udc6e\u200b\udb40\udc67\u200b\udb40\udc7f"
                            );
                    case "emoji":
                        return !n(e, "\ud83d\udc26\u200d\u2b1b", "\ud83d\udc26\u200b\u2b1b")
                }
                return !1
            }

            function f(e, t, n) {
                var r = "undefined" != typeof WorkerGlobalScope && self instanceof WorkerGlobalScope ? new OffscreenCanvas(
                        300, 150) : i.createElement("canvas")
                    , a = r.getContext("2d", {
                        willReadFrequently: !0
                    })
                    , o = (a.textBaseline = "top", a.font = "600 32px Arial", {});
                return e.forEach(function(e) {
                    o[e] = t(a, e, n)
                }), o
            }

            function t(e) {
                var t = i.createElement("script");
                t.src = e, t.defer = !0, i.head.appendChild(t)
            }
            "undefined" != typeof Promise && (o = "wpEmojiSettingsSupports", s = ["flag", "emoji"], n.supports = {
                everything: !0
                , everythingExceptFlag: !0
            }, e = new Promise(function(e) {
                i.addEventListener("DOMContentLoaded", e, {
                    once: !0
                })
            }), new Promise(function(t) {
                var n = function() {
                    try {
                        var e = JSON.parse(sessionStorage.getItem(o));
                        if ("object" == typeof e && "number" == typeof e.timestamp && (new Date).valueOf() <
                            e.timestamp + 604800 && "object" == typeof e.supportTests) return e.supportTests
                    } catch (e) {}
                    return null
                }();
                if (!n) {
                    if ("undefined" != typeof Worker && "undefined" != typeof OffscreenCanvas && "undefined" !=
                        typeof URL && URL.createObjectURL && "undefined" != typeof Blob) try {
                        var e = "postMessage(" + f.toString() + "(" + [JSON.stringify(s), u.toString(), p
                                .toString()
                            ].join(",") + "));"
                            , r = new Blob([e], {
                                type: "text/javascript"
                            })
                            , a = new Worker(URL.createObjectURL(r), {
                                name: "wpTestEmojiSupports"
                            });
                        return void(a.onmessage = function(e) {
                            c(n = e.data), a.terminate(), t(n)
                        })
                    } catch (e) {}
                    c(n = f(s, u, p))
                }
                t(n)
            }).then(function(e) {
                for (var t in e) n.supports[t] = e[t], n.supports.everything = n.supports.everything && n
                    .supports[t], "flag" !== t && (n.supports.everythingExceptFlag = n.supports
                        .everythingExceptFlag && n.supports[t]);
                n.supports.everythingExceptFlag = n.supports.everythingExceptFlag && !n.supports.flag, n
                    .DOMReady = !1, n.readyCallback = function() {
                        n.DOMReady = !0
                    }
            }).then(function() {
                return e
            }).then(function() {
                var e;
                n.supports.everything || (n.readyCallback(), (e = n.source || {}).concatemoji ? t(e
                    .concatemoji) : e.wpemoji && e.twemoji && (t(e.twemoji), t(e.wpemoji)))
            }))
        }((window, document), window._wpemojiSettings);
        /* ]]> */

    </script>
    <style id="wp-emoji-styles-inline-css" type="text/css">
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 0.07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }

    </style>
    <link rel="stylesheet" id="wp-block-library-css" href="/dark/wp-includes/css/dist/block-library/style.min.css?ver=6.5.2" type="text/css" media="all">
    <style id="wp-block-library-theme-inline-css" type="text/css">
        .wp-block-audio figcaption {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .wp-block-audio figcaption {
            color: #ffffffa6
        }

        .wp-block-audio {
            margin: 0 0 1em
        }

        .wp-block-code {
            border: 1px solid #ccc;
            border-radius: 4px;
            font-family: Menlo, Consolas, monaco, monospace;
            padding: .8em 1em
        }

        .wp-block-embed figcaption {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .wp-block-embed figcaption {
            color: #ffffffa6
        }

        .wp-block-embed {
            margin: 0 0 1em
        }

        .blocks-gallery-caption {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .blocks-gallery-caption {
            color: #ffffffa6
        }

        .wp-block-image figcaption {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .wp-block-image figcaption {
            color: #ffffffa6
        }

        .wp-block-image {
            margin: 0 0 1em
        }

        .wp-block-pullquote {
            border-bottom: 4px solid;
            border-top: 4px solid;
            color: currentColor;
            margin-bottom: 1.75em
        }

        .wp-block-pullquote cite,
        .wp-block-pullquote footer,
        .wp-block-pullquote__citation {
            color: currentColor;
            font-size: .8125em;
            font-style: normal;
            text-transform: uppercase
        }

        .wp-block-quote {
            border-left: .25em solid;
            margin: 0 0 1.75em;
            padding-left: 1em
        }

        .wp-block-quote cite,
        .wp-block-quote footer {
            color: currentColor;
            font-size: .8125em;
            font-style: normal;
            position: relative
        }

        .wp-block-quote.has-text-align-right {
            border-left: none;
            border-right: .25em solid;
            padding-left: 0;
            padding-right: 1em
        }

        .wp-block-quote.has-text-align-center {
            border: none;
            padding-left: 0
        }

        .wp-block-quote.is-large,
        .wp-block-quote.is-style-large,
        .wp-block-quote.is-style-plain {
            border: none
        }

        .wp-block-search .wp-block-search__label {
            font-weight: 700
        }

        .wp-block-search__button {
            border: 1px solid #ccc;
            padding: .375em .625em
        }

        :where(.wp-block-group.has-background) {
            padding: 1.25em 2.375em
        }

        .wp-block-separator.has-css-opacity {
            opacity: .4
        }

        .wp-block-separator {
            border: none;
            border-bottom: 2px solid;
            margin-left: auto;
            margin-right: auto
        }

        .wp-block-separator.has-alpha-channel-opacity {
            opacity: 1
        }

        .wp-block-separator:not(.is-style-wide):not(.is-style-dots) {
            width: 100px
        }

        .wp-block-separator.has-background:not(.is-style-dots) {
            border-bottom: none;
            height: 1px
        }

        .wp-block-separator.has-background:not(.is-style-wide):not(.is-style-dots) {
            height: 2px
        }

        .wp-block-table {
            margin: 0 0 1em
        }

        .wp-block-table td,
        .wp-block-table th {
            word-break: normal
        }

        .wp-block-table figcaption {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .wp-block-table figcaption {
            color: #ffffffa6
        }

        .wp-block-video figcaption {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .wp-block-video figcaption {
            color: #ffffffa6
        }

        .wp-block-video {
            margin: 0 0 1em
        }

        .wp-block-template-part.has-background {
            margin-bottom: 0;
            margin-top: 0;
            padding: 1.25em 2.375em
        }

    </style>
    <style id="classic-theme-styles-inline-css" type="text/css">
        /*! This file is auto-generated */

        .wp-block-button__link {
            color: #fff;
            background-color: #32373c;
            border-radius: 9999px;
            box-shadow: none;
            text-decoration: none;
            padding: calc(.667em + 2px) calc(1.333em + 2px);
            font-size: 1.125em
        }

        .wp-block-file__button {
            background: #32373c;
            color: #fff;
            text-decoration: none
        }

    </style>
    <style id="global-styles-inline-css" type="text/css">
        body {
            --wp--preset--color--black: #000000;
            --wp--preset--color--cyan-bluish-gray: #abb8c3;
            --wp--preset--color--white: #ffffff;
            --wp--preset--color--pale-pink: #f78da7;
            --wp--preset--color--vivid-red: #cf2e2e;
            --wp--preset--color--luminous-vivid-orange: #ff6900;
            --wp--preset--color--luminous-vivid-amber: #fcb900;
            --wp--preset--color--light-green-cyan: #7bdcb5;
            --wp--preset--color--vivid-green-cyan: #00d084;
            --wp--preset--color--pale-cyan-blue: #8ed1fc;
            --wp--preset--color--vivid-cyan-blue: #0693e3;
            --wp--preset--color--vivid-purple: #9b51e0;
            --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgba(6, 147, 227, 1) 0%, rgb(155, 81, 224) 100%);
            --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
            --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgba(252, 185, 0, 1) 0%, rgba(255, 105, 0, 1) 100%);
            --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgba(255, 105, 0, 1) 0%, rgb(207, 46, 46) 100%);
            --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
            --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
            --wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
            --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
            --wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
            --wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
            --wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
            --wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
            --wp--preset--font-size--small: 13px;
            --wp--preset--font-size--medium: 20px;
            --wp--preset--font-size--large: 36px;
            --wp--preset--font-size--x-large: 42px;
            --wp--preset--spacing--20: 0.44rem;
            --wp--preset--spacing--30: 0.67rem;
            --wp--preset--spacing--40: 1rem;
            --wp--preset--spacing--50: 1.5rem;
            --wp--preset--spacing--60: 2.25rem;
            --wp--preset--spacing--70: 3.38rem;
            --wp--preset--spacing--80: 5.06rem;
            --wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);
            --wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);
            --wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);
            --wp--preset--shadow--outlined: 6px 6px 0px -3px rgba(255, 255, 255, 1), 6px 6px rgba(0, 0, 0, 1);
            --wp--preset--shadow--crisp: 6px 6px 0px rgba(0, 0, 0, 1);
        }

        :where(.is-layout-flex) {
            gap: 0.5em;
        }

        :where(.is-layout-grid) {
            gap: 0.5em;
        }

        body .is-layout-flow>.alignleft {
            float: left;
            margin-inline-start: 0;
            margin-inline-end: 2em;
        }

        body .is-layout-flow>.alignright {
            float: right;
            margin-inline-start: 2em;
            margin-inline-end: 0;
        }

        body .is-layout-flow>.aligncenter {
            margin-left: auto !important;
            margin-right: auto !important;
        }

        body .is-layout-constrained>.alignleft {
            float: left;
            margin-inline-start: 0;
            margin-inline-end: 2em;
        }

        body .is-layout-constrained>.alignright {
            float: right;
            margin-inline-start: 2em;
            margin-inline-end: 0;
        }

        body .is-layout-constrained>.aligncenter {
            margin-left: auto !important;
            margin-right: auto !important;
        }

        body .is-layout-constrained> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
            max-width: var(--wp--style--global--content-size);
            margin-left: auto !important;
            margin-right: auto !important;
        }

        body .is-layout-constrained>.alignwide {
            max-width: var(--wp--style--global--wide-size);
        }

        body .is-layout-flex {
            display: flex;
        }

        body .is-layout-flex {
            flex-wrap: wrap;
            align-items: center;
        }

        body .is-layout-flex>* {
            margin: 0;
        }

        body .is-layout-grid {
            display: grid;
        }

        body .is-layout-grid>* {
            margin: 0;
        }

        :where(.wp-block-columns.is-layout-flex) {
            gap: 2em;
        }

        :where(.wp-block-columns.is-layout-grid) {
            gap: 2em;
        }

        :where(.wp-block-post-template.is-layout-flex) {
            gap: 1.25em;
        }

        :where(.wp-block-post-template.is-layout-grid) {
            gap: 1.25em;
        }

        .has-black-color {
            color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-color {
            color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-color {
            color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-color {
            color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-color {
            color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-color {
            color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-color {
            color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-color {
            color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-color {
            color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-color {
            color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-color {
            color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-color {
            color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-black-background-color {
            background-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-background-color {
            background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-background-color {
            background-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-background-color {
            background-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-background-color {
            background-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-background-color {
            background-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-background-color {
            background-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-background-color {
            background-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-background-color {
            background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-background-color {
            background-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-black-border-color {
            border-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-border-color {
            border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-border-color {
            border-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-border-color {
            border-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-border-color {
            border-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-border-color {
            border-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-border-color {
            border-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-border-color {
            border-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-border-color {
            border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-border-color {
            border-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
            background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
        }

        .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
            background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
        }

        .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-orange-to-vivid-red-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
        }

        .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
            background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
        }

        .has-cool-to-warm-spectrum-gradient-background {
            background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
        }

        .has-blush-light-purple-gradient-background {
            background: var(--wp--preset--gradient--blush-light-purple) !important;
        }

        .has-blush-bordeaux-gradient-background {
            background: var(--wp--preset--gradient--blush-bordeaux) !important;
        }

        .has-luminous-dusk-gradient-background {
            background: var(--wp--preset--gradient--luminous-dusk) !important;
        }

        .has-pale-ocean-gradient-background {
            background: var(--wp--preset--gradient--pale-ocean) !important;
        }

        .has-electric-grass-gradient-background {
            background: var(--wp--preset--gradient--electric-grass) !important;
        }

        .has-midnight-gradient-background {
            background: var(--wp--preset--gradient--midnight) !important;
        }

        .has-small-font-size {
            font-size: var(--wp--preset--font-size--small) !important;
        }

        .has-medium-font-size {
            font-size: var(--wp--preset--font-size--medium) !important;
        }

        .has-large-font-size {
            font-size: var(--wp--preset--font-size--large) !important;
        }

        .has-x-large-font-size {
            font-size: var(--wp--preset--font-size--x-large) !important;
        }

        .wp-block-navigation a:where(:not(.wp-element-button)) {
            color: inherit;
        }

        :where(.wp-block-post-template.is-layout-flex) {
            gap: 1.25em;
        }

        :where(.wp-block-post-template.is-layout-grid) {
            gap: 1.25em;
        }

        :where(.wp-block-columns.is-layout-flex) {
            gap: 2em;
        }

        :where(.wp-block-columns.is-layout-grid) {
            gap: 2em;
        }

        .wp-block-pullquote {
            font-size: 1.5em;
            line-height: 1.6;
        }

    </style>
    <link rel="stylesheet" id="contact-form-7-css" href="/dark/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=5.8.1" type="text/css" media="all">
    <link rel="stylesheet" id="hfe-style-css" href="/dark/wp-content/plugins/header-footer-elementor/assets/css/header-footer-elementor.css?ver=1.6.16" type="text/css" media="all">
    <link rel="stylesheet" id="elementor-icons-css" href="/dark/wp-content/plugins/elementor/assets/lib/eicons/css/elementor-icons.min.css?ver=5.23.0" type="text/css" media="all">
    <link rel="stylesheet" id="elementor-frontend-css" href="/dark/wp-content/plugins/elementor/assets/css/frontend-lite.min.css?ver=3.16.5" type="text/css" media="all">
    <link rel="stylesheet" id="swiper-css" href="/dark/wp-content/plugins/elementor/assets/lib/swiper/v8/css/swiper.min.css?ver=8.4.5" type="text/css" media="all">
    <link rel="stylesheet" id="elementor-post-7-css" href="/dark/wp-content/uploads/elementor/css/post-7.css?ver=1697351777" type="text/css" media="all">
    <link rel="stylesheet" id="elementor-global-css" href="/dark/wp-content/uploads/elementor/css/global.css?ver=1697351777" type="text/css" media="all">
    <link rel="stylesheet" id="elementor-post-67-css" href="/dark/wp-content/uploads/elementor/css/post-67.css?ver=1697352569" type="text/css" media="all">
    <link rel="stylesheet" id="hfe-widgets-style-css" href="/dark/wp-content/plugins/header-footer-elementor/inc/widgets-css/frontend.css?ver=1.6.16" type="text/css" media="all">
    <link rel="stylesheet" id="elementor-post-367-css" href="/dark/wp-content/uploads/elementor/css/post-367.css?ver=1697351777" type="text/css" media="all">
    <link rel="stylesheet" id="bitrader-custom-css" href="/dark/wp-content/themes/bitrader/assets/css/bitrader-custom.css?ver=6.5.2" type="text/css" media="all">
    <style id="bitrader-custom-inline-css" type="text/css">
        html:root {
            /* --brand-color: #f9a826ff */
            --brand-color: #00D094
        }

        html:root {
            --secondary-color: #f9a826ff
        }

        /* color: #f9a826ff; */

    </style>
    <link rel="stylesheet" id="bitrader-fonts-css" href="/dark/wp-content/themes/bitrader/assets/css/bitrader-fonts.css?ver=6.5.2" type="text/css" media="all">
    <link rel="stylesheet" id="bootstrap-css" href="/dark/wp-content/themes/bitrader/assets/css/bootstrap.min.css?ver=6.5.2" type="text/css" media="all">
    <link rel="stylesheet" id="font-awesome-free-css" href="/dark/wp-content/themes/bitrader/assets/css/fontawesome-all.min.css?ver=6.5.2" type="text/css" media="all">
    <link rel="stylesheet" id="aos-css" href="/dark/wp-content/themes/bitrader/assets/css/aos.css?ver=6.5.2" type="text/css" media="all">
    <link rel="stylesheet" id="bitrader-core-css" href="/dark/wp-content/themes/bitrader/assets/css/bitrader-core.css?ver=6.5.2" type="text/css" media="all">
    <link rel="stylesheet" id="bitrader-unit-css" href="/dark/wp-content/themes/bitrader/assets/css/bitrader-unit.css?ver=6.5.2" type="text/css" media="all">
    <link rel="stylesheet" id="bitrader-style-css" href="/dark/wp-content/themes/bitrader/style.css?ver=6.5.2" type="text/css" media="all">
    <link rel="stylesheet" id="google-fonts-1-css" href="https://fonts.googleapis.com/css?family=Roboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto+Slab%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CAnek+Telugu%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7COpen+Sans%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&#038;display=swap&#038;ver=6.5.2" type="text/css" media="all">
    <link rel="stylesheet" id="elementor-icons-shared-0-css" href="/dark/wp-content/plugins/elementor/assets/lib/font-awesome/css/fontawesome.min.css?ver=5.15.3" type="text/css" media="all">
    <link rel="stylesheet" id="elementor-icons-fa-brands-css" href="/dark/wp-content/plugins/elementor/assets/lib/font-awesome/css/brands.min.css?ver=5.15.3" type="text/css" media="all">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="/dark/wp-includes/js/jquery/jquery.min.js?ver=3.7.1" id="jquery-core-js"></script>
    <script type="text/javascript" src="/dark/wp-includes/js/jquery/jquery-migrate.min.js?ver=3.4.1" id="jquery-migrate-js">
    </script>
    <link rel="https://api.w.org/" href="/dark/wp-json/">
    <link rel="alternate" type="application/json" href="/dark/wp-json/wp/v2/pages/67">
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="/dark/xmlrpc.php?rsd">
    <meta name="generator" content="WordPress 6.5.2">
    <link rel="canonical" href="/dark/">
    <link rel="shortlink" href="/dark/">
    <link rel="alternate" type="application/json+oembed" href="/dark/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fbitrader.thetork.com%2Fdark%2F">
    <link rel="alternate" type="text/xml+oembed" href="/dark/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fbitrader.thetork.com%2Fdark%2F&#038;format=xml">
    <meta name="generator" content="Elementor 3.16.5; features: e_dom_optimization, e_optimized_assets_loading, e_optimized_css_loading, additional_custom_breakpoints; settings: css_print_method-external, google_font-enabled, font_display-swap">
    <link rel="icon" href="/tst/grnyellow.png" sizes="32x32">
    <link rel="icon" href="/tst/grnyellow.png" sizes="192x192">
    <link rel="apple-touch-icon" href="/tst/grnyellow.png">
    <meta name="msapplication-TileImage" content="/tst/grnyellow.png">
    <style id="kirki-inline-styles"></style>
</head>

<body class="home page-template page-template-elementor_header_footer page page-id-67 wp-embed-responsive ehf-footer ehf-template-bitrader ehf-stylesheet-bitrader no-sidebar elementor-default elementor-template-full-width elementor-kit-7 elementor-page elementor-page-67">
    <!-- preloader -->
    <!-- <div class="preloader">
            <img src="/tst/grnyellow.png" style="max-height: 60px" alt="Preloader">
        </div> -->
    <!-- preloader-end -->
    <!-- <a href="javascript:void(0)" class="scrollToTop scroll__top scroll-to-target scrollToTop--home1" data-target="html">
            <i class="fas fa-angle-up"></i>
        </a> -->

    {{-- <div style="position: absolute; height: 100vh; width: 100%;">

        <video controls autoplay src="/videos/web/bck_video_1.mp4" type="video/mp4" class="media-document mac video">
        </video>

    </div> --}}


    <div style="position: absolute; height: 100vh; width: 100%;">

        <img src="/images/web/banner_5.jpg" style="height: 100vh; width: 100%;">

    </div>

    <!-- HEADER -->
    @if ($page == 'all')
    <header id="stick-header" class="header-section header-section--style2">
        <div class="header-bottom">
            <div class="container">
                <div class="header-wrapper">
                    <div class="logo" style="display: none;">
                        <a class="main-logo" href="/dark/" style="display: flex; justify-content: center;">
                            <img src="/tst/grnyellow.png" style="max-height: 60px" alt="Logo">
                        </a>
                        <h3 style="text-align: center;">Golden Way International</h3>
                        <h3 style="text-align: center; font-size: 13px;">Golden Way International</h3>
                    </div>
                    <div class="menu-area menu--style1">
                        <ul id="menu-main-menu" class="main-menu">
                            <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-826" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children dropdown has-dropdown active menu-item-826 nav-item">
                                <a title="Home" href="#" class="nav-links">Home</a>
                                <ul class="sub-menu" role="menu">
                                    <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-816" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-67 current_page_item active menu-item-816 nav-item">
                                        <a title="Home Stock" href="#our-values" class="dropdown-items">Our
                                            Values</a>
                                    </li>
                                    <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-816" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-67 current_page_item active menu-item-816 nav-item">
                                        <a title="Home Stock" href="#the-benefits" class="dropdown-items">Benefits</a>
                                    </li>
                                    <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-816" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-67 current_page_item active menu-item-816 nav-item">
                                        <a title="Home Stock" href="#market-analysis" class="dropdown-items">Market Analysis</a>
                                    </li>
                                    <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-816" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-67 current_page_item active menu-item-816 nav-item">
                                        <a title="Home Stock" href="#invest-plans" class="dropdown-items">Invest
                                            Plans</a>
                                    </li>
                                    <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-816" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-67 current_page_item active menu-item-816 nav-item">
                                        <a title="Home Stock" href="#growth-testing" class="dropdown-items">Growth Testing</a>
                                    </li>
                                    <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-816" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-67 current_page_item active menu-item-816 nav-item">
                                        <a title="Home Stock" href="#the-management" class="dropdown-items">Management</a>
                                    </li>
                                    <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-826" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children dropdown has-dropdown active menu-item-826 nav-item">
                                        <a title="Home" href="#ai-trading" class="nav-links">AI Trading</a>
                                        <ul class="sub-menu" role="menu">
                                            <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-816" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-67 current_page_item active menu-item-816 nav-item">
                                                <a title="Home Stock" href="#arbitrage-bot" class="dropdown-items">Arbitrage Bot</a>
                                            </li>
                                            <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-816" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-67 current_page_item active menu-item-816 nav-item">
                                                <a title="Home Stock" href="#risk-free" class="dropdown-items">Invest Risk Free</a>
                                            </li>
                                            <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-816" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-67 current_page_item active menu-item-816 nav-item">
                                                <a title="Home Stock" href="#low-latency" class="dropdown-items">Low Latency Execution</a>
                                            </li>
                                            <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-816" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-67 current_page_item active menu-item-816 nav-item">
                                                <a title="Home Stock" href="#quant-team" class="dropdown-items">Dedicated Quant Team</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-818" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-818 nav-item">
                                <a title="About Us" href="/?page=aboutus" class="nav-links">About Us</a>
                            </li>

                            <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-818" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-818 nav-item">
                                <a title="About Us" href="#our-mission" class="nav-links">Our Mission</a>
                            </li>
                            <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-818" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-818 nav-item">
                                <a title="About Us" href="#our-vision" class="nav-links">Our Vision</a>
                            </li>
                            <!-- <li
                                itemscope="itemscope"
                                itemtype="https://www.schema.org/SiteNavigationElement"
                                id="menu-item-818"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-818 nav-item"
                            >
                                <a title="About Us" href="#gms-academy" class="nav-links">GWI Academy</a>
                            </li> -->
                            <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-818" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-818 nav-item">
                                <a title="About Us" href="/all/calculator?amnt=100&typ=compound" class="nav-links">Package Calculation</a>
                            </li>
                            <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-819" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-819 nav-item">
                                <a title="Contact Us" href="#colophon" class="nav-links">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                    <div class="header-action">
                        <div class="menu-area">
                            <div class="header-btn">
                                <a href="/login" class="member-login-btn trk-btn trk-btn--border trk-btn--primary">
                                    <span>Member Login</span>
                                </a>
                            </div>
                            <!-- toggle icons -->
                            <div class="header-bar d-lg-none header-bar--style1">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @endif
    <style>
        @media (max-width: 767px) {
            .header-wrapper .menu-area .header-btn {
                display: flex !important;
                margin-top: 30px;
            }

            .menu-area {
                flex-direction: column-reverse;
            }
        }

        /* Gold metallic text gradient */
        .banner-title span,
        .secondary-gold-text {
            background: linear-gradient(135deg, #FFE082, #FFB300, #FF8F00) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
            font-weight: 700 !important;
        }

        /* Member Login button with premium gold glow */
        .member-login-btn {
            animation: gold-glow 2s ease-in-out infinite !important;
            border: 1px solid rgba(212, 175, 55, 0.4) !important;
            background: rgba(212, 175, 55, 0.1) !important;
            color: #FFE082 !important;
            box-shadow: 0 0 10px rgba(212, 175, 55, 0.2) !important;
            transition: all 0.3s ease !important;
        }

        .member-login-btn:hover {
            background: rgba(212, 175, 55, 0.3) !important;
            border-color: rgba(212, 175, 55, 0.8) !important;
            color: #fff !important;
        }

        @keyframes gold-glow {
            0% {
                box-shadow: 0 0 5px rgba(212, 175, 55, 0.2);
            }

            50% {
                box-shadow: 0 0 20px rgba(212, 175, 55, 0.6);
            }

            100% {
                box-shadow: 0 0 5px rgba(212, 175, 55, 0.2);
            }
        }

        /* Gold Action Buttons overrides */
        .trk-btn.trk-btn--primary,
        .trk-btn.trk-btn--border.trk-btn--primary,
        .get-started-btn {
            background: linear-gradient(135deg, #FFD700 0%, #D4AF37 50%, #B38728 100%) !important;
            border: none !important;
            border-color: transparent !important;
            color: #0d0e12 !important;
            font-weight: 600 !important;
            box-shadow: 0 4px 15px rgba(212, 175, 55, 0.3) !important;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1) !important;
            border-radius: 30px !important;
        }

        .trk-btn.trk-btn--primary:hover,
        .trk-btn.trk-btn--border.trk-btn--primary:hover,
        .get-started-btn:hover {
            background: linear-gradient(135deg, #FFE082 0%, #FFC107 50%, #FF8F00 100%) !important;
            box-shadow: 0 6px 20px rgba(212, 175, 55, 0.5) !important;
            transform: translateY(-2px) !important;
            color: #0d0e12 !important;
        }

        .watch-video-btn {
            background: rgba(255, 255, 255, 0.1) !important;
            color: #fff !important;
            border: 1px solid rgba(255, 255, 255, 0.2) !important;
            border-radius: 30px !important;
            transition: all 0.3s ease !important;
        }

        .watch-video-btn:hover {
            background: rgba(255, 255, 255, 0.2) !important;
            border-color: rgba(255, 255, 255, 0.4) !important;
            color: #fff !important;
        }

        .watch-svg svg g path {
            stroke: #fff !important;
        }

        .watch-svg svg rect {
            stroke: #fff !important;
        }

        /* Glassmorphic Section Cards with subtle gold border & glow */
        .sectioncards {
            background: rgba(15, 18, 26, 0.85) !important;
            backdrop-filter: blur(12px) !important;
            -webkit-backdrop-filter: blur(12px) !important;
            border: 1px solid rgba(212, 175, 55, 0.2) !important;
            padding: 30px !important;
            border-radius: 16px !important;
            margin: 40px auto !important;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.5) !important;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1) !important;
        }

        .sectioncards:hover {
            transform: translateY(-5px) !important;
            border-color: rgba(212, 175, 55, 0.55) !important;
            box-shadow: 0 20px 40px rgba(212, 175, 55, 0.15), 0 12px 40px rgba(0, 0, 0, 0.6) !important;
        }

        @media (max-width: 1024px) and (min-width: 768px) {
            .elementor-67 .elementor-element.elementor-element-47b6712 {
                --content-width: 90% !important;
            }
        }

        .about__thumb-image.floating-content {
            display: flex;
            justify-content: center;
        }

        @media (max-width: 1024px) {
            .elementor-67 .elementor-element.elementor-element-3d03e0f {
                --padding-block-start: 40px !important;
                --padding-block-end: 40px !important;
            }
        }

        /* Sticky nav fixed header */
        .stticky-fixed {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            padding: 12px 24px;
            color: #fff !important;
            background: rgba(18, 18, 20, 0.95) !important;
            border-bottom: 1px solid rgba(212, 175, 55, 0.3) !important;
            backdrop-filter: blur(12px) !important;
            -webkit-backdrop-filter: blur(12px) !important;
            z-index: 100;
            height: auto !important;
            opacity: 1 !important;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4) !important;
        }

        /* About Us Cards Grid and Gold Card styles */
        .aboutus-cards-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 30px;
            padding: 20px 0 40px 0;
            width: 100%;
        }

        .aboutus-gold-card {
            background: rgba(15, 18, 26, 0.8) !important;
            backdrop-filter: blur(12px) !important;
            -webkit-backdrop-filter: blur(12px) !important;
            border-radius: 16px !important;
            overflow: hidden !important;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1) !important;
            display: flex !important;
            flex-direction: column !important;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4) !important;
        }

        .card-image-wrapper {
            position: relative;
            width: 100%;
            height: 220px;
            overflow: hidden;
            flex-shrink: 0;
        }

        .card-image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .aboutus-gold-card:hover .card-image-wrapper img {
            transform: scale(1.1);
        }

        .card-image-wrapper::after {
            content: '';
            position: absolute;
            top: 0;
            left: -75%;
            width: 50%;
            height: 100%;
            background: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.2) 100%);
            transform: skewX(-25deg);
            transition: none;
        }

        .aboutus-gold-card:hover .card-image-wrapper::after {
            animation: card-shine 0.8s ease;
        }

        @keyframes card-shine {
            100% {
                left: 125%;
            }
        }

        .card-content-wrapper {
            padding: 24px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }

        .card-content-wrapper h3 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 12px;
            transition: color 0.3s ease;
        }

        .card-content-wrapper p {
            color: #e0e0e0;
            font-size: 0.95rem;
            line-height: 1.6;
            margin: 0;
        }

        /* Metallic Colors & Themes */
        /* Platinum */
        .card-theme-platinum {
            border: 1px solid rgba(224, 224, 224, 0.2) !important;
        }

        .card-theme-platinum:hover {
            transform: translateY(-8px) !important;
            border-color: rgba(255, 255, 255, 0.8) !important;
            box-shadow: 0 20px 40px rgba(224, 224, 224, 0.2), 0 10px 30px rgba(0, 0, 0, 0.5) !important;
        }

        .card-theme-platinum .card-content-wrapper h3 {
            background: linear-gradient(135deg, #FFFFFF, #B0BEC5) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
        }

        .card-theme-platinum .card-image-wrapper {
            border-bottom: 1px solid rgba(224, 224, 224, 0.15) !important;
        }

        /* Rose Gold */
        .card-theme-rosegold {
            border: 1px solid rgba(236, 178, 163, 0.2) !important;
        }

        .card-theme-rosegold:hover {
            transform: translateY(-8px) !important;
            border-color: rgba(236, 178, 163, 0.8) !important;
            box-shadow: 0 20px 40px rgba(236, 178, 163, 0.2), 0 10px 30px rgba(0, 0, 0, 0.5) !important;
        }

        .card-theme-rosegold .card-content-wrapper h3 {
            background: linear-gradient(135deg, #FFEBE6, #ECB2A3) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
        }

        .card-theme-rosegold .card-image-wrapper {
            border-bottom: 1px solid rgba(236, 178, 163, 0.15) !important;
        }

        /* Titanium */
        .card-theme-titanium {
            border: 1px solid rgba(144, 164, 174, 0.25) !important;
        }

        .card-theme-titanium:hover {
            transform: translateY(-8px) !important;
            border-color: rgba(144, 164, 174, 0.8) !important;
            box-shadow: 0 20px 40px rgba(144, 164, 174, 0.25), 0 10px 30px rgba(0, 0, 0, 0.5) !important;
        }

        .card-theme-titanium .card-content-wrapper h3 {
            background: linear-gradient(135deg, #CFD8DC, #78909C) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
        }

        .card-theme-titanium .card-image-wrapper {
            border-bottom: 1px solid rgba(144, 164, 174, 0.15) !important;
        }

        /* Imperial Gold */
        .card-theme-gold {
            border: 1px solid rgba(212, 175, 55, 0.2) !important;
        }

        .card-theme-gold:hover {
            transform: translateY(-8px) !important;
            border-color: rgba(212, 175, 55, 0.8) !important;
            box-shadow: 0 20px 40px rgba(212, 175, 55, 0.2), 0 10px 30px rgba(0, 0, 0, 0.5) !important;
        }

        .card-theme-gold .card-content-wrapper h3 {
            background: linear-gradient(135deg, #FFE082, #FFB300) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
        }

        .card-theme-gold .card-image-wrapper {
            border-bottom: 1px solid rgba(212, 175, 55, 0.15) !important;
        }

        /* Responsive Grid & Spans on Desktop */
        @media (min-width: 768px) {
            .aboutus-cards-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .grid-col-span-2 {
                grid-column: span 2 !important;
                flex-direction: row !important;
            }

            .grid-col-span-2 .card-image-wrapper {
                width: 42% !important;
                height: auto !important;
                min-height: 100% !important;
                border-bottom: none !important;
                position: relative !important;
            }

            .grid-col-span-2 .card-image-wrapper img {
                position: absolute !important;
                top: 0 !important;
                left: 0 !important;
                width: 100% !important;
                height: 100% !important;
                object-fit: cover !important;
            }

            .grid-col-span-2 .card-content-wrapper {
                width: 58% !important;
                justify-content: center !important;
            }

            .grid-row-span-2 {
                grid-row: span 2 !important;
            }

            .grid-row-span-2 .card-image-wrapper {
                height: 280px !important;
            }

            /* Adjust borders for wide cards in horizontal flex mode */
            .grid-col-span-2.card-theme-platinum .card-image-wrapper {
                border-right: 1px solid rgba(224, 224, 224, 0.15) !important;
            }

            .grid-col-span-2.card-theme-rosegold .card-image-wrapper {
                border-right: 1px solid rgba(236, 178, 163, 0.15) !important;
            }

            .grid-col-span-2.card-theme-titanium .card-image-wrapper {
                border-right: 1px solid rgba(144, 164, 174, 0.15) !important;
            }

            .grid-col-span-2.card-theme-gold .card-image-wrapper {
                border-right: 1px solid rgba(212, 175, 55, 0.15) !important;
            }
        }

        /* Homepage Side-by-Side Sections Grid */
        .homepage-sections-grid-container {
            width: 100%;
        }

        @media (min-width: 992px) {
            .homepage-sections-grid-container {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 40px;
                max-width: 960px;
                margin: 0 auto;
                padding: 0 15px;
                align-items: stretch;
            }
        }

        @media (min-width: 1200px) {
            .homepage-sections-grid-container {
                max-width: 1140px;
            }
        }

        .homepage-sections-grid-container {
            max-width: 100% !important;
            padding-left: 5% !important;
            padding-right: 5% !important;
        }

        @media (min-width: 992px) {
            .homepage-sections-grid-container>.stticky {
                margin-bottom: 0 !important;
            }

            .homepage-sections-grid-container .e-con-inner {
                flex-direction: column !important;
                align-items: stretch !important;
                height: 100% !important;
                padding: 40px 30px !important;
            }

            .homepage-sections-grid-container .e-con-inner .e-child {
                width: 100% !important;
                margin-top: 25px !important;
            }

            .homepage-sections-grid-container .e-con-inner .e-child:first-child {
                margin-top: 0 !important;
            }

            .homepage-sections-grid-container .about__thumb {
                padding-right: 0 !important;
                margin-bottom: 0 !important;
            }

            .homepage-sections-grid-container .about__thumb-image img {
                width: 100% !important;
                height: 240px !important;
                object-fit: cover !important;
                border-radius: 12px !important;
            }

            /* Only containers with .grid-last-span-2 will have their last child span 2 columns */
            .homepage-sections-grid-container.grid-last-span-2>*:last-child {
                grid-column: span 2 !important;
            }
        }

        /* Contact and Support Section Premium Overrides */
        .contact-main-card {
            background: linear-gradient(135deg, rgba(20, 22, 28, 0.95) 0%, rgba(10, 11, 15, 0.98) 100%) !important;
            backdrop-filter: blur(20px) !important;
            -webkit-backdrop-filter: blur(20px) !important;
            border: 1px solid rgba(212, 175, 55, 0.25) !important;
            border-radius: 24px !important;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.8), inset 0 1px 2px rgba(255, 255, 255, 0.05) !important;
            padding: 40px !important;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1) !important;
            position: relative;
            overflow: hidden;
        }

        .contact-main-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(212, 175, 55, 0.4), transparent);
        }

        .contact-main-card:hover {
            border-color: rgba(212, 175, 55, 0.6) !important;
            box-shadow: 0 25px 60px rgba(212, 175, 55, 0.12), 0 20px 50px rgba(0, 0, 0, 0.9) !important;
            transform: translateY(-3px) !important;
        }

        .contact-form-panel {
            background: rgba(255, 255, 255, 0.02) !important;
            border: 1px solid rgba(255, 255, 255, 0.05) !important;
            border-radius: 16px !important;
            padding: 35px !important;
            box-shadow: inset 0 1px 1px rgba(255, 255, 255, 0.02), 0 10px 30px rgba(0, 0, 0, 0.4) !important;
            transition: border-color 0.3s ease !important;
        }

        .contact-form-panel:hover {
            border-color: rgba(212, 175, 55, 0.2) !important;
        }

        /* Form controls styling */
        .contact-form-input {
            background: rgba(255, 255, 255, 0.03) !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            color: #ffffff !important;
            border-radius: 10px !important;
            padding: 14px 20px !important;
            font-size: 15px !important;
            transition: all 0.3s ease !important;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3) !important;
            width: 100% !important;
        }

        .contact-form-input::placeholder {
            color: rgba(255, 255, 255, 0.4) !important;
        }

        .contact-form-input:focus {
            border-color: #f9a826ff !important;
            background: rgba(255, 255, 255, 0.06) !important;
            box-shadow: 0 0 15px rgba(249, 168, 38, 0.25), inset 0 2px 4px rgba(0, 0, 0, 0.2) !important;
            outline: none !important;
        }

        /* Submit Button styling */
        .contact-submit-btn {
            background: linear-gradient(135deg, #FFD700 0%, #D4AF37 50%, #B38728 100%) !important;
            border: none !important;
            color: #0d0e12 !important;
            font-weight: 600 !important;
            letter-spacing: 0.5px !important;
            padding: 14px 30px !important;
            border-radius: 10px !important;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1) !important;
            box-shadow: 0 4px 15px rgba(212, 175, 55, 0.3) !important;
            cursor: pointer !important;
            white-space: nowrap !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
        }

        .contact-submit-btn:hover {
            background: linear-gradient(135deg, #FFE082 0%, #FFC107 50%, #FF8F00 100%) !important;
            box-shadow: 0 6px 20px rgba(212, 175, 55, 0.5), 0 2px 4px rgba(0, 0, 0, 0.2) !important;
            transform: translateY(-2px) !important;
        }

        .contact-submit-btn:active {
            transform: translateY(0) !important;
            box-shadow: 0 3px 10px rgba(212, 175, 55, 0.3) !important;
        }

        /* Responsive form container layout */
        .contact-main-card .cta-form__inner {
            display: flex !important;
            gap: 15px !important;
            flex-wrap: nowrap !important;
            width: 100% !important;
        }

        @media (max-width: 575px) {
            .contact-main-card .cta-form__inner {
                flex-direction: column !important;
                align-items: stretch !important;
            }
            .contact-main-card .cta-form__inner .contact-submit-btn {
                margin-top: 10px !important;
            }
        }

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer">


    <!-- main-area -->
    <main class="main-area fix" style="background: radial-gradient(ellipse at top, #1e1810 0%, #0a0b0f 80%) !important;">
        <div data-elementor-type="wp-page" data-elementor-id="67" class="elementor elementor-67">

            <!-- banner -->
            @if ($page == 'all')
            <div class="elementor-element elementor-element-25a533a e-con-full e-flex e-con e-parent" data-id="25a533a" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}" data-core-v316-plus="true">
                <div class="elementor-element elementor-element-2ac0b36 elementor-widget elementor-widget-hero-banner" data-id="2ac0b36" data-element_type="widget" data-widget_type="hero-banner.default">
                    <div class="elementor-widget-container">
                        <script>
                            jQuery(document).ready(function($) {

                                AOS.init();

                            });

                        </script>
                        <section class="banner banner--style1 tg-section">
                            <div class="banner__bg">
                                <div class="banner__bg-element">
                                    {{-- <img
                                            decoding="async"
                                            src="/dark/wp-content/uploads/2023/10/banner_bg_dark.png"
                                            alt="section-bg-element"
                                            class="dark d-none d-lg-block"
                                        > --}}
                                    <span class="bg-color d-lg-none"></span>
                                </div>
                            </div>
                            <div class="container">
                                <div class="banner__wrapper">
                                    <div class="row gy-5 gx-4">
                                        <div class="col-lg-6 col-md-7">
                                            <div>
                                                {{-- <div class="banner__content tg-content" data-aos="fade-right" data-aos-duration="1000"> --}}
                                                <div class="banner__content-coi">
                                                    <div style="height: 80px;"></div>
                                                    <img decoding="async" style="height: 160px; display: none;" src="/tst/grnyellow.png" alt="Coin icon">
                                                </div>
                                                <h1 class="banner-title banner__content-heading title">
                                                    Golden
                                                    <span>Way</span>
                                                    International
                                                </h1>
                                                <p class="banner__content-moto">
                                                    Anyone can invest money to different currency to increase their
                                                    earnings by the help of GWI through online.
                                                </p>
                                                <div class="banner__btn-group btn-group">
                                                    <a href="/login" target="_self" style="color: #fff !important;" rel="nofollow" class="get-started-btn trk-btn trk-btn--primary trk-btn--arrow">
                                                        Get Started
                                                        <span>
                                                            <i class="fas fa-arrow-right"></i>
                                                        </span>
                                                    </a>
                                                    <a href="https://youtu.be/_Fyk9pQ1Opw" class="watch-video-btn trk-btn trk-btn--outline22" data-fslightbox>
                                                        <span class="style1 watch-svg">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <g clip-path="url(#clip0_1397_814)">
                                                                    <path d="M10.5547 7.03647C9.89015 6.59343 9 7.06982 9 7.86852V16.1315C9 16.9302 9.89015 17.4066 10.5547 16.9635L16.7519 12.8321C17.3457 12.4362 17.3457 11.5638 16.7519 11.1679L10.5547 7.03647Z" stroke="#0A4FD5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                </g>
                                                                <rect x="-0.75" y="0.75" width="22.5" height="22.5" rx="11.25" transform="matrix(-1 0 0 1 22.5 0)" stroke="#0A4FD5" stroke-width="1.5" />
                                                                <defs>
                                                                    <clipPath id="clip0_1397_814">
                                                                        <rect width="24" height="24" fill="white" />
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                        </span>
                                                        Watch Video
                                                    </a>
                                                    <!-- <img
                                                            decoding="async"
                                                            style="height: 140px;"
                                                            src="https://cdn.pixabay.com/animation/2023/07/26/00/20/00-20-51-158_512.gif"
                                                            alt="Coin icon"
                                                        > -->
                                                </div>
                                                <div class="banner__content-social">
                                                    <p>Follow Us</p>
                                                    <ul class="social">
                                                        <li class="social__item">
                                                            <a href="#" class="social__link social__link--style1">
                                                                <i aria-hidden="true" class="fab fa-facebook-f"></i>
                                                            </a>
                                                        </li>
                                                        <li class="social__item">
                                                            <a href="#" class="social__link social__link--style1">
                                                                <i aria-hidden="true" class="fab fa-linkedin-in"></i>
                                                            </a>
                                                        </li>
                                                        <li class="social__item">
                                                            <a href="#" class="social__link social__link--style1">
                                                                <i aria-hidden="true" class="fab fa-instagram"></i>
                                                            </a>
                                                        </li>
                                                        <li class="social__item">
                                                            <a href="#" class="social__link social__link--style1">
                                                                <i aria-hidden="true" class="fab fa-youtube"></i>
                                                            </a>
                                                        </li>
                                                        <li class="social__item">
                                                            <a href="#" class="social__link social__link--style1">
                                                                <i aria-hidden="true" class="fab fa-twitter"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-5">
                                            <div class="banner__thumb" id="bird">
                                                <img style="height: 398px;" decoding="async" src="/tst/grnyellow.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="banner__shape">
                                <span class="banner__shape-item banner__shape-item--1">
                                    <img decoding="async" src="/wp-content/uploads/2023/10/4.png" width="43" alt="shape icon">
                                </span>
                            </div>
                        </section>
                        <!-- banner-area-end /imgs-->
                    </div>
                </div>
            </div>
            @endif

            <!-- scroll images -->
            <!-- <div
                    class="elementor-element elementor-element-ee44b74 e-con-full e-flex e-con e-parent"
                    data-id="ee44b74"
                    data-element_type="container"
                    data-settings="{&quot;content_width&quot;:&quot;full&quot;}"
                    data-core-v316-plus="true"
                >
                    <div
                        class="elementor-element elementor-element-5433ca4 elementor-widget elementor-widget-brand"
                        data-id="5433ca4"
                        data-element_type="widget"
                        data-widget_type="brand.default"
                    >
                        <div class="elementor-widget-container">
                            <script>
                                jQuery(document).ready(function($) {

                                    // component slider here
                                    const Partner = new Swiper('.partner__slider', {
                                        spaceBetween: 24,
                                        grabCursor: true,
                                        loop: true,
                                        slidesPerView: 2,
                                        breakpoints: {
                                            576: {
                                                slidesPerView: 3,
                                            },
                                            768: {
                                                slidesPerView: 4,
                                            },
                                            992: {
                                                slidesPerView: 5,
                                                spaceBetween: 15,
                                            },
                                            1200: {
                                                slidesPerView: 6,
                                                spaceBetween: 25,
                                            },
                                        },
                                        autoplay: {
                                            delay: 1,
                                            disableOnInteraction: true,
                                        },
                                        speed: 2000,
                                    });

                                });
                            </script>
                            <div class="partner partner--gradient tg-section">
                                <div class="container">
                                    <div class="partner__wrapper">
                                        <div class="partner__slider swiper">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <div class="partner__item">
                                                        <div class="partner__item-inner">
                                                            <a href="#">
                                                                <img decoding="async" src="/dark/wp-content/uploads/2023/10/barnd01.png" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="partner__item">
                                                        <div class="partner__item-inner">
                                                            <a href="#">
                                                                <img decoding="async" src="/dark/wp-content/uploads/2023/10/barnd02.png" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="partner__item">
                                                        <div class="partner__item-inner">
                                                            <a href="#">
                                                                <img decoding="async" src="/dark/wp-content/uploads/2023/10/barnd_dark03.png" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="partner__item">
                                                        <div class="partner__item-inner">
                                                            <a href="#">
                                                                <img decoding="async" src="/dark/wp-content/uploads/2023/10/barnd_dark04.png" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="partner__item">
                                                        <div class="partner__item-inner">
                                                            <a href="#">
                                                                <img decoding="async" src="/dark/wp-content/uploads/2023/10/barnd_dark05.png" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="partner__item">
                                                        <div class="partner__item-inner">
                                                            <a href="#">
                                                                <img decoding="async" src="/dark/wp-content/uploads/2023/10/barnd06.png" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

            <style>
                /*! elementor - v3.16.0 - 09-10-2023 */

                .elementor-heading-title {
                    padding: 0;
                    margin: 0;
                    line-height: 1
                }

                .elementor-widget-heading .elementor-heading-title[class*=elementor-size-]>a {
                    color: inherit;
                    font-size: inherit;
                    line-height: inherit
                }

                .elementor-widget-heading .elementor-heading-title.elementor-size-small {
                    font-size: 15px
                }

                .elementor-widget-heading .elementor-heading-title.elementor-size-medium {
                    font-size: 19px
                }

                .elementor-widget-heading .elementor-heading-title.elementor-size-large {
                    font-size: 29px
                }

                .elementor-widget-heading .elementor-heading-title.elementor-size-xl {
                    font-size: 39px
                }

                .elementor-widget-heading .elementor-heading-title.elementor-size-xxl {
                    font-size: 59px
                }

            </style>


            <style>
                .stticky {}

                .stticky-fixed {
                    position: fixed;
                    top: 0;
                    left: 0;
                    right: 0;
                    padding: 10px 20px;
                    color: #fff !important;
                    background: var(--secondary-color);
                    z-index: 100;
                    height: auto !important;
                    opacity: 1 !important;
                }

                .stticky-text {
                    opacity: 0;
                    height: 0px;
                }

                .sec-top-img {
                    display: flex !important;
                    align-items: start !important;
                }

            </style>

            @if ($page == 'all')
            <div class="homepage-sections-grid-container">
                @endif

                <!-- About-Us -->
                @if ($page == 'all' || $page == 'aboutus')
                <div class="stticky">
                    <div class="stticky-text">About US</div>
                    <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="about-us" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                        <div class="e-con-inner sectioncards sec-top-img">
                            <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                                <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                                    <div class="elementor-widget-container">
                                        <h2 class="elementor-heading-title banner-title elementor-size-default">
                                            ABOUT
                                            <span style="color: var(--secondary-color);">US</span>
                                        </h2>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                                    <style>
                                        .about-p span {
                                            color: #fff;
                                        }

                                    </style>
                                    <div class="elementor-widget-container">
                                        <p class="elementor-heading-title elementor-size-default about-p">
                                            “GoldenWay Investment (GWI) is a leading institutional digital asset staking and algorithmic yield generation ecosystem. We leverage state-of-the-art high-frequency trading (HFT) infrastructure, quantitative modeling, and smart contract structures to deliver consistent, risk-adjusted returns for our global partners.
                                            <br>
                                            <br>
                                            Our platform integrates machine learning analysis with automated arbitrage bots that capitalize on structural price inefficiencies across global cryptocurrency and foreign exchange spot/derivative markets. By combining technical innovation with strict risk mitigation frameworks, we empower our users to compound their capital with confidence.”
                                        </p>

                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                                    <div class="elementor-widget-container">
                                        @if ($page == 'all')
                                        <a href="/?page=aboutus" target="_self" rel="nofollow" style="background-color: #f9a826ff; border-color: #f9a826ff;" class="trk-btn trk-btn--border trk-btn--primary">
                                            More
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" style="margin-top: 30px;" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                                <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                                    <div class="elementor-widget-container">
                                        <script>
                                            jQuery(document).ready(function($) {

                                                AOS.init();

                                            });

                                        </script>
                                        <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                            <div class="about__thumb-inner">
                                                <div class="about__thumb-image floating-content">
                                                    <img decoding="async" style="height: 298px;" src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?q=80&w=600&auto=format&fit=crop" alt="GWI Advisory">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif


                @if ($page == 'aboutus')
                <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="our-values" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                    <div class="e-con-inner" style="max-width: 1200px; margin: 0 auto; padding: 20px 0;">
                        <div class="aboutus-cards-grid">

                            <!-- Card 1 -->
                            <div class="aboutus-gold-card grid-col-span-2 card-theme-platinum" data-aos="fade-up" data-aos-duration="600">
                                <div class="card-image-wrapper">
                                    <img src="https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?q=80&w=600&auto=format&fit=crop" alt="Strategic Execution Blueprint">
                                </div>
                                <div class="card-content-wrapper">
                                    <h3>Strategic Execution Blueprint</h3>
                                    <p>"Success in the markets begins with a robust, rule-based roadmap. We help you define custom entry, exit, and risk-management parameters, backtested against decades of historical data to ensure absolute statistical viability."</p>
                                </div>
                            </div>

                            <!-- Card 2 -->
                            <div class="aboutus-gold-card grid-row-span-2 card-theme-rosegold" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100">
                                <div class="card-image-wrapper">
                                    <img src="https://images.unsplash.com/photo-1590283603385-17ffb3a7f29f?q=80&w=600&auto=format&fit=crop" alt="Professional Capital Management">
                                </div>
                                <div class="card-content-wrapper">
                                    <h3>Professional Capital Management</h3>
                                    <p>"We view trading as a high-performance corporate operation. By organizing your portfolios with meticulous risk assessments, cost audits, and performance tracking, we maximize long-term enterprise sustainability."</p>
                                </div>
                            </div>

                            <!-- Card 3 -->
                            <div class="aboutus-gold-card card-theme-titanium" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200">
                                <div class="card-image-wrapper">
                                    <img src="https://images.unsplash.com/photo-1639762681485-074b7f938ba0?q=80&w=600&auto=format&fit=crop" alt="AI & Machine Learning Advantage">
                                </div>
                                <div class="card-content-wrapper">
                                    <h3>AI & Machine Learning Advantage</h3>
                                    <p>"Gain an edge over retail traders by harnessing the power of advanced algorithmic bots. GWI analyzes complex market streams across Forex and crypto in real-time, executing trades at high-velocity speed."</p>
                                </div>
                            </div>

                            <!-- Card 4 -->
                            <div class="aboutus-gold-card card-theme-gold" data-aos="fade-up" data-aos-duration="600">
                                <div class="card-image-wrapper">
                                    <img src="https://images.unsplash.com/photo-1621416894569-0f39ed31d247?q=80&w=600&auto=format&fit=crop" alt="Fortified Asset Security">
                                </div>
                                <div class="card-content-wrapper">
                                    <h3>Fortified Asset Security</h3>
                                    <p>"Capital preservation is our highest priority. Through dynamic stop-loss automation and algorithmic hedging strategies, we insulate your investments from sudden, high-volatility market movements."</p>
                                </div>
                            </div>

                            <!-- Card 5 -->
                            <div class="aboutus-gold-card grid-col-span-2 card-theme-rosegold" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100">
                                <div class="card-image-wrapper">
                                    <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=600&auto=format&fit=crop" alt="Adaptive Market Intelligence">
                                </div>
                                <div class="card-content-wrapper">
                                    <h3>Adaptive Market Intelligence</h3>
                                    <p>"Financial landscapes evolve dynamically. Our academy keeps you updated with advanced market structures, macroeconomic insights, and new decentralized technologies so you are always ahead of the curve."</p>
                                </div>
                            </div>

                            <!-- Card 6 -->
                            <div class="aboutus-gold-card card-theme-platinum" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200">
                                <div class="card-image-wrapper">
                                    <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?q=80&w=600&auto=format&fit=crop" alt="Expert Peer Accountability">
                                </div>
                                <div class="card-content-wrapper">
                                    <h3>Expert Peer Accountability</h3>
                                    <p>"Uncontrolled emotions are the leading cause of trading losses. GWI provides a collaborative community and expert mentoring, keeping your trading activities transparent, disciplined, and rule-bound."</p>
                                </div>
                            </div>

                            <!-- Card 7 -->
                            <div class="aboutus-gold-card card-theme-titanium" data-aos="fade-up" data-aos-duration="600">
                                <div class="card-image-wrapper">
                                    <img src="https://images.unsplash.com/photo-1508962914676-134849a727f0?q=80&w=600&auto=format&fit=crop" alt="High-Discipline Simulation">
                                </div>
                                <div class="card-content-wrapper">
                                    <h3>High-Discipline Simulation</h3>
                                    <p>"Master your psychology using our zero-risk trading simulators. Practice consistent risk allocation and refine your strategy until execution becomes an automated, emotionless habit."</p>
                                </div>
                            </div>

                            <!-- Card 8 -->
                            <div class="aboutus-gold-card grid-col-span-2 card-theme-gold" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100">
                                <div class="card-image-wrapper">
                                    <img src="https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?q=80&w=600&auto=format&fit=crop" alt="Comprehensive Trade Ledger">
                                </div>
                                <div class="card-content-wrapper">
                                    <h3>Comprehensive Trade Ledger</h3>
                                    <p>"Every order holds a lesson. Our detailed automated journal tracks win rates, drawdowns, and execution errors, giving you the precise data needed to continuously optimize your trading performance."</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @endif


                <!-- Mission -->
                @if ($page == 'all' || $page == 'ourmission')
                <div class="stticky">
                    <div class="stticky-text">Our Mission</div>
                    <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="our-mission" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                        <div class="e-con-inner sectioncards">
                            <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                                <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                                    <div class="elementor-widget-container">
                                        <script>
                                            jQuery(document).ready(function($) {

                                                AOS.init();

                                            });

                                        </script>
                                        <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                            <div class="about__thumb-inner">
                                                <div class="about__thumb-image floating-content">
                                                    <img decoding="async" style="height: 298px;" src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=600&auto=format&fit=crop" alt="Our Mission">
                                                    <div class="floating-content__top-left">
                                                        <!-- <div class="floating-content__item">
                                                        <h3>10 Years</h3>
                                                        <p>Consulting Experience</p>
                                                    </div> -->
                                                    </div>
                                                    <div class="floating-content__bottom-right">
                                                        <!-- <div class="floating-content__item">
                                                        <h3>25K+</h3>
                                                        <p>Satisfied Customers</p>
                                                    </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                                <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                                    <div class="elementor-widget-container">
                                        <h2 class="elementor-heading-title elementor-size-default">
                                            Our
                                            <span style="color: var(--secondary-color);">Mission</span>
                                        </h2>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                                    <div class="elementor-widget-container">
                                        <p class="elementor-heading-title elementor-size-default">
                                            "Our mission is to democratize institutional-grade digital asset staking and high-performance algorithmic yield strategies. We are committed to providing transparent, highly secure financial infrastructure, real-time market-neutral execution, and robust cryptographic security frameworks that enable investors worldwide to grow their wealth. By bridging the gap between traditional quantitative finance and decentralized ecosystems, we work to cultivate long-term financial freedom and stable passive earnings for partners across the globe."
                                        </p>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                                    <div class="elementor-widget-container">
                                        <!-- <a
                                        href="/dark/about-us/"
                                        target="_self"
                                        rel="nofollow"
                                        class="trk-btn trk-btn--border trk-btn--primary"
                                    >
                                        More
                                    </a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <script></script>

                <!-- Vision -->
                @if ($page == 'all' || $page == 'ourmission')
                <div class="stticky">
                    <div class="stticky-text">Our Vision</div>
                    <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="our-vision" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                        <div class="e-con-inner sectioncards">
                            <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                                <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                                    <div class="elementor-widget-container">
                                        <h2 class="elementor-heading-title banner-title elementor-size-default">
                                            Our
                                            <span style="color: var(--secondary-color);">Vision</span>
                                        </h2>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                                    <div class="elementor-widget-container">
                                        <p class="elementor-heading-title elementor-size-default">
                                            “Our vision is to build the world's most secure, reliable, and technologically advanced decentralized staking ecosystem, bridging the gap between traditional asset management and Web3 yield optimization to foster sustainable wealth generation. We aim to establish a borderless, permissionless financial framework where retail and institutional participants can seamlessly access premium algorithmic trading systems, advanced liquidity verification networks, and automated risk-management engines to navigate the digital asset economy with absolute ease.”
                                        </p>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                                    <div class="elementor-widget-container">
                                        <!--  <a
                                       href="/dark/about-us/"
                                        target="_self"
                                        rel="nofollow"
                                        style="background-color: #f9a826ff;"
                                        class="trk-btn trk-btn--border trk-btn--primary"
                                    >
                                        More
                                    </a> -->
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                                <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                                    <div class="elementor-widget-container">
                                        <script>
                                            jQuery(document).ready(function($) {

                                                AOS.init();

                                            });

                                        </script>
                                        <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                            <div class="about__thumb-inner">
                                                <div class="about__thumb-image floating-content">
                                                    <img decoding="async" style="height: 298px;" src="https://images.unsplash.com/photo-1507679799987-c73779587ccf?q=80&w=600&auto=format&fit=crop" alt="Our Vision">
                                                    <div class="floating-content__top-left">
                                                        <!-- <div class="floating-content__item">
                                                        <h3>10 Years</h3>
                                                        <p>Consulting Experience</p>
                                                    </div> -->
                                                    </div>
                                                    <div class="floating-content__bottom-right">
                                                        <!-- <div class="floating-content__item">
                                                        <h3>25K+</h3>
                                                        <p>Satisfied Customers</p>
                                                    </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <!-- values -->
                @if ($page == 'all' || $page == 'ourmission')
                <div class="stticky">
                    <div class="stticky-text">Our Values</div>
                    <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="our-values" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                        <div class="e-con-inner sectioncards">
                            <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                                <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                                    <div class="elementor-widget-container">
                                        <script>
                                            jQuery(document).ready(function($) {

                                                AOS.init();

                                            });

                                        </script>
                                        <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                            <div class="about__thumb-inner">
                                                <div class="about__thumb-image floating-content">
                                                    <img decoding="async" src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=600&auto=format&fit=crop" alt="Our Values">
                                                    <div class="floating-content__top-left">
                                                        <!-- <div class="floating-content__item">
                                                        <h3>10 Years</h3>
                                                        <p>Consulting Experience</p>
                                                    </div> -->
                                                    </div>
                                                    <div class="floating-content__bottom-right">
                                                        <!-- <div class="floating-content__item">
                                                        <h3>25K+</h3>
                                                        <p>Satisfied Customers</p>
                                                    </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                                <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                                    <div class="elementor-widget-container">
                                        <h2 class="elementor-heading-title elementor-size-default">
                                            Our
                                            <span style="color: var(--secondary-color);">Values</span>
                                        </h2>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                                    <div class="elementor-widget-container">
                                        <p class="elementor-heading-title elementor-size-default">
                                            "We are guided by three core pillars: mathematical precision, complete transparency, and technological innovation. We prioritize the security of our stakeholders' capital, maintain robust operational integrity, and continuously push the boundaries of algorithmic execution. By upholding absolute compliance, executing comprehensive audits, and focusing on reliable cross-chain protocol validation, we maintain a trusted, stable, and highly performant platform that protects user assets while maximizing yield consistency across market cycles."
                                        </p>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                                    <div class="elementor-widget-container">
                                        <!-- <a
                                        href="/dark/about-us/"
                                        target="_self"
                                        rel="nofollow"
                                        class="trk-btn trk-btn--border trk-btn--primary"
                                    >
                                        More
                                    </a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Our Projects -->
                @if ($page == 'all' || $page == 'ourmission')
                <div class="stticky">
                    <div class="stticky-text">Our Projects</div>
                    <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="our-vision" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                        <div class="e-con-inner sectioncards card-img-top">
                            <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                                <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                                    <div class="elementor-widget-container">
                                        <h2 class="elementor-heading-title banner-title elementor-size-default">
                                            Our
                                            <span style="color: var(--secondary-color);">Projects</span>
                                        </h2>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                                    <div class="elementor-widget-container">
                                        <p class="elementor-heading-title elementor-size-default">
                                            “We develop and operate a suite of high-performance decentralized financial products, from algorithmic yield aggregators and tokenized asset programs to validator node scaling systems. By designing custom smart contracts, quantitative cross-exchange liquidity routers, and institutional staking pools, our team continuously builds real-world applications that solve capital inefficiency. We aim to expand our software suite to cover multi-chain liquid derivatives and automated delta-neutral vaults, offering diverse options for global participants.”
                                        </p>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                                    <div class="elementor-widget-container">
                                        <a href="/?page=ourproject" target="_self" rel="nofollow" style="background-color: #f9a826ff; border-color: #f9a826ff;" class="trk-btn trk-btn--border trk-btn--primary">
                                            View All
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                                <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                                    <div class="elementor-widget-container">
                                        <script>
                                            jQuery(document).ready(function($) {

                                                AOS.init();

                                            });

                                        </script>
                                        <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                            <div class="about__thumb-inner">
                                                <div class="about__thumb-image floating-content">
                                                    <img decoding="async" style="height: 298px;" src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=600&auto=format&fit=crop" alt="Our Projects">
                                                    <div class="floating-content__top-left">
                                                        <!-- <div class="floating-content__item">
                                                        <h3>10 Years</h3>
                                                        <p>Consulting Experience</p>
                                                    </div> -->
                                                    </div>
                                                    <div class="floating-content__bottom-right">
                                                        <!-- <div class="floating-content__item">
                                                        <h3>25K+</h3>
                                                        <p>Satisfied Customers</p>
                                                    </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif


                <style>
                    .about-p span {
                        color: #fff !important;
                        font-weight: 600;
                    }

                </style>

                @if ($page == 'ourproject')
                <!-- GWI -->
                <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="our-vision" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                    <div class="e-con-inner sectioncards sec-top-img">
                        <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <h2 class="elementor-heading-title banner-title elementor-size-default">
                                        1
                                        <span style="color: var(--secondary-color);">GWI</span>
                                    </h2>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <p class="elementor-heading-title elementor-size-small about-p" style="font-size: 13px;">
                                        The GWI ecosystem is positioned at the intersection of quantitative finance and blockchain infrastructure. We continuously expand our capabilities to capitalize on emerging market dynamics.
                                        <br>
                                        <br>
                                        <br>
                                        <span>(a) Institutional-Grade Staking:</span> We provide secure, high-yield staking pools built on institutional validator nodes across major proof-of-stake blockchains, ensuring maximum security and uptime.
                                        <br>
                                        <br>
                                        <span>(b) Cross-Chain Yield Optimizers:</span> Our automated algorithms dynamically scan multi-chain yield opportunities, reallocating assets across protocols to capture the highest risk-adjusted staking rewards.
                                        <br>
                                        <br>
                                        <span>(c) Liquidity Provisioning:</span> GWI serves as a major liquidity provider on automated market makers (AMMs) and decentralized exchanges, earning swap fees that boost overall user dividends.
                                        <br>
                                        <br>
                                        <span>(d) Advanced Arbitrage Infrastructure:</span> Our proprietary bots monitor cross-exchange price discrepancies, executing statistical arbitrage trades in milliseconds to lock in market-neutral profits.
                                        <br>
                                        <br>
                                        <span>(e) Decentralized Governance:</span> We are transitionting to a decentralized autonomous organization (DAO) model, allowing GWI token holders to vote on key protocol parameters and reserve allocations.
                                        <br>
                                        <br>
                                        <span>(f) Long-term Strategic Reserves:</span> GWI maintains a diversified treasury of top-tier digital assets and gold-backed tokens to back our staking pools and insulate investors from tail-risk events.
                                        <br>
                                        <br>
                                        While the digital asset market is highly dynamic, GWI's multi-layered strategy ensures sustainable capital compounding throughout all market cycles.
                                    </p>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                                <div class="elementor-widget-container">
                                    <!--  <a
                                       href="/dark/about-us/"
                                        target="_self"
                                        rel="nofollow"
                                        style="background-color: #f9a826ff;"
                                        class="trk-btn trk-btn--border trk-btn--primary"
                                    >
                                        More
                                    </a> -->
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                                <div class="elementor-widget-container">
                                    <script>
                                        jQuery(document).ready(function($) {

                                            AOS.init();

                                        });

                                    </script>
                                    <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                        <div class="about__thumb-inner">
                                            <div class="about__thumb-image floating-content">
                                                <img decoding="async" style="height: 298px; margin-top: 70px;" src="/tst/grnyellow.png" alt="">
                                                <div class="floating-content__top-left">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>10 Years</h3>
                                                        <p>Consulting Experience</p>
                                                    </div> -->
                                                </div>
                                                <div class="floating-content__bottom-right">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>25K+</h3>
                                                        <p>Satisfied Customers</p>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- GWI 2 -->
                <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="our-vision" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                    <div class="e-con-inner sectioncards sec-top-img">
                        <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                                <div class="elementor-widget-container">
                                    <script>
                                        jQuery(document).ready(function($) {

                                            AOS.init();

                                        });

                                    </script>
                                    <style>
                                        @media (max-width:1200px) {
                                            .gmss-img-thumb {
                                                display: none;
                                            }
                                        }

                                    </style>
                                    <div class="about__thumb pe-lg-5 gmss-img-thumb" data-aos="fade-right" data-aos-duration="800">
                                        <div class="about__thumb-inner">
                                            <div class="about__thumb-image floating-content">
                                                <img decoding="async" style="height: 298px;" src="https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?q=80&w=600&auto=format&fit=crop" alt="Plan">
                                                <div class="floating-content__top-left">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>10 Years</h3>
                                                        <p>Consulting Experience</p>
                                                    </div> -->
                                                </div>
                                                <div class="floating-content__bottom-right">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>25K+</h3>
                                                        <p>Satisfied Customers</p>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <p class="elementor-heading-title elementor-size-small about-p" style="font-size: 13px;">
                                        GWI supports a curated selection of highly liquid digital assets, allowing investors to stake their preferred tokens and earn daily compounding rewards:
                                        <br>
                                        <br>
                                        <span> Bitcoin Staking (BTC): </span> Earn passive yield on Bitcoin through our wrapped asset staking pools and market-neutral futures hedging strategies.
                                        <br>
                                        <br>
                                        <span> Ethereum Staking (ETH): </span> Participate in direct validator-node staking on the Ethereum network, backed by GWI's automated MEV-boosted reward extraction.
                                        <br>
                                        <br>
                                        <span> Stablecoin Pools (USDT/USDC): </span> Secure stable, high-yield staking dividends pegged to the US Dollar, shielded from cryptocurrency market volatility.
                                        <br>
                                        <br>
                                        <span> BNB Chain Staking (BNB): </span> Leverage high-capacity validator staking on the BNB chain to capitalize on high transaction fee volumes.
                                        <br>
                                        <br>
                                        <span> High-Speed Staking (SOL): </span> Earn premium rewards by participating in Solana validator clusters, optimized for low-latency network inflation yield.
                                        <br>
                                        <br>
                                        <span> Gold-Backed Assets (PAXG): </span> Stake tokenized physical gold to hedge against inflation while earning additional yield through GWI's quantitative trading strategies.
                                        <br>
                                        <br>
                                        <span> Multi-Chain Staking (ADA/DOT): </span> Diversify your staking portfolio across robust, decentralized network validation nodes with GWI's automated yield compounding.
                                    </p>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                                <div class="elementor-widget-container">
                                    <!--  <a
                                       href="/dark/about-us/"
                                        target="_self"
                                        rel="nofollow"
                                        style="background-color: #f9a826ff;"
                                        class="trk-btn trk-btn--border trk-btn--primary"
                                    >
                                        More
                                    </a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- BMS -->
                <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="our-values" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                    <div class="e-con-inner sectioncards">
                        <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                                <div class="elementor-widget-container">
                                    <script>
                                        jQuery(document).ready(function($) {

                                            AOS.init();

                                        });

                                    </script>
                                    <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                        <div class="about__thumb-inner">
                                            <div class="about__thumb-image floating-content">
                                                <img decoding="async" src="https://images.unsplash.com/photo-1579621970795-87faff2f9050?q=80&w=600&auto=format&fit=crop" alt="Billionaire Mindset Program">
                                                <div class="floating-content__top-left">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>10 Years</h3>
                                                        <p>Consulting Experience</p>
                                                    </div> -->
                                                </div>
                                                <div class="floating-content__bottom-right">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>25K+</h3>
                                                        <p>Satisfied Customers</p>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <h2 class="elementor-heading-title elementor-size-default">
                                        2
                                        <span style="color: var(--secondary-color);">Billionare Mindset Program</span>
                                    </h2>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <p class="elementor-heading-title elementor-size-default">
                                        Motivation training is a program that takes place inside an organization aiming
                                        to increase and maintain an employee's motivation levels, dedication, and desire
                                        to reach professional goals and successfully contribute to the company's
                                        success.
                                    </p>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                                <div class="elementor-widget-container">
                                    <!-- <a
                                        href="/dark/about-us/"
                                        target="_self"
                                        rel="nofollow"
                                        class="trk-btn trk-btn--border trk-btn--primary"
                                    >
                                        More
                                    </a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Web3.0 Technology -->
                <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="our-vision" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                    <div class="e-con-inner sectioncards sec-top-img">
                        <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <h2 class="elementor-heading-title banner-title elementor-size-default">
                                        3
                                        <span style="color: var(--secondary-color);">Web3.0 </span>
                                        Technology
                                    </h2>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <p class="elementor-heading-title elementor-size-small about-p" style="font-size: 13px;">
                                        GWI leverages Web3.0 technologies to build decentralized, trustless, and permissionless financial interfaces. By utilizing smart contract automation, decentralized storage, and cryptographic wallets, we return ownership of assets, data, and yield back to the individual.
                                    </p>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                                <div class="elementor-widget-container">
                                    <a href="/?page=web3" target="_self" rel="nofollow" style="background-color: #f9a826ff; border-color: #f9a826ff;" class="trk-btn trk-btn--border trk-btn--primary">
                                        More
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                                <div class="elementor-widget-container">
                                    <script>
                                        jQuery(document).ready(function($) {

                                            AOS.init();

                                        });

                                    </script>
                                    <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                        <div class="about__thumb-inner">
                                            <div class="about__thumb-image floating-content">
                                                <img decoding="async" style="height: 298px;" src="https://images.unsplash.com/photo-1639762681485-074b7f938ba0?q=80&w=600&auto=format&fit=crop" alt="Web3.0">
                                                <div class="floating-content__top-left">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>10 Years</h3>
                                                        <p>Consulting Experience</p>
                                                    </div> -->
                                                </div>
                                                <div class="floating-content__bottom-right">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>25K+</h3>
                                                        <p>Satisfied Customers</p>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Financial Mangement -->
                <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="our-values" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                    <div class="e-con-inner sectioncards">
                        <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                                <div class="elementor-widget-container">
                                    <script>
                                        jQuery(document).ready(function($) {

                                            AOS.init();

                                        });

                                    </script>
                                    <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                        <div class="about__thumb-inner">
                                            <div class="about__thumb-image floating-content">
                                                <img decoding="async" style="height: 298px;" src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?q=80&w=600&auto=format&fit=crop" alt="Financial Management">
                                                <div class="floating-content__top-left">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>10 Years</h3>
                                                        <p>Consulting Experience</p>
                                                    </div> -->
                                                </div>
                                                <div class="floating-content__bottom-right">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>25K+</h3>
                                                        <p>Satisfied Customers</p>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <h2 class="elementor-heading-title elementor-size-default">
                                        4
                                        <span style="color: var(--secondary-color);">Financial Management</span>
                                    </h2>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <p class="elementor-heading-title elementor-size-default about-p">
                                        GWI provides institutional-grade risk management and treasury services. Our capital protection models utilize dynamic stop-loss adjustments, multi-sig asset custody, and real-time ledger audits to ensure total security and maximum utilization of reserve assets.
                                    </p>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                                <div class="elementor-widget-container">
                                    <!-- <a
                                        href="/dark/about-us/"
                                        target="_self"
                                        rel="nofollow"
                                        class="trk-btn trk-btn--border trk-btn--primary"
                                    >
                                        More
                                    </a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--  Sales Training -->
                <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="our-vision" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                    <div class="e-con-inner sectioncards">
                        <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <h2 class="elementor-heading-title banner-title elementor-size-default">
                                        5
                                        <span style="color: var(--secondary-color);">Strategic Leadership</span>
                                        &amp; Network Growth
                                    </h2>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <p class="elementor-heading-title elementor-size-default">
                                        We empower our global network partners with advanced communication models, client relation strategies, and financial ecosystem knowledge. Our structured training programs cultivate high-performing leadership, enabling promoters to scale their staking networks and compound team building bonuses.
                                    </p>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                                <div class="elementor-widget-container">
                                    <!--  <a
                                       href="/dark/about-us/"
                                        target="_self"
                                        rel="nofollow"
                                        style="background-color: #f9a826ff;"
                                        class="trk-btn trk-btn--border trk-btn--primary"
                                    >
                                        More
                                    </a> -->
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                                <div class="elementor-widget-container">
                                    <script>
                                        jQuery(document).ready(function($) {

                                            AOS.init();

                                        });

                                    </script>
                                    <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                        <div class="about__thumb-inner">
                                            <div class="about__thumb-image floating-content">
                                                <img decoding="async" style="height: 298px;" src="https://images.unsplash.com/photo-1557804506-669a67965ba0?q=80&w=600&auto=format&fit=crop" alt="Sales">
                                                <div class="floating-content__top-left">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>10 Years</h3>
                                                        <p>Consulting Experience</p>
                                                    </div> -->
                                                </div>
                                                <div class="floating-content__bottom-right">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>25K+</h3>
                                                        <p>Satisfied Customers</p>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Business Support -->
                <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="our-values" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                    <div class="e-con-inner sectioncards">
                        <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                                <div class="elementor-widget-container">
                                    <script>
                                        jQuery(document).ready(function($) {

                                            AOS.init();

                                        });

                                    </script>
                                    <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                        <div class="about__thumb-inner">
                                            <div class="about__thumb-image floating-content">
                                                <img decoding="async" style="height: 298px;" src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=600&auto=format&fit=crop" alt="Business Support">
                                                <div class="floating-content__top-left">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>10 Years</h3>
                                                        <p>Consulting Experience</p>
                                                    </div> -->
                                                </div>
                                                <div class="floating-content__bottom-right">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>25K+</h3>
                                                        <p>Satisfied Customers</p>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <h2 class="elementor-heading-title elementor-size-default">
                                        6
                                        <span style="color: var(--secondary-color);">24/7 Institutional</span>
                                        Partner Support
                                    </h2>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <p class="elementor-heading-title elementor-size-default">
                                        GWI provides comprehensive technical and operational support to all network participants. From dedicated client relationship managers to round-the-clock developer support, we ensure your staking experience is seamless, secure, and continuously optimized.
                                    </p>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                                <div class="elementor-widget-container">
                                    <!-- <a
                                        href="/dark/about-us/"
                                        target="_self"
                                        rel="nofollow"
                                        class="trk-btn trk-btn--border trk-btn--primary"
                                    >
                                        More
                                    </a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- WEB DESINING -->
                <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="our-vision" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                    <div class="e-con-inner sectioncards">
                        <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <h2 class="elementor-heading-title banner-title elementor-size-default">
                                        7
                                        <span style="color: var(--secondary-color);">Intuitive Web3</span>
                                        Interface &amp; DApps
                                    </h2>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <p class="elementor-heading-title elementor-size-default">
                                        Our decentralized applications are engineered for friction-free navigation. GWI's customer interfaces provide real-time yield tracking, detailed wallet logs, and instant deposit/withdrawal processing, prioritizing ease-of-use and user security.
                                    </p>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                                <div class="elementor-widget-container">
                                    <!--  <a
                                       href="/dark/about-us/"
                                        target="_self"
                                        rel="nofollow"
                                        style="background-color: #f9a826ff;"
                                        class="trk-btn trk-btn--border trk-btn--primary"
                                    >
                                        More
                                    </a> -->
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                                <div class="elementor-widget-container">
                                    <script>
                                        jQuery(document).ready(function($) {

                                            AOS.init();

                                        });

                                    </script>
                                    <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                        <div class="about__thumb-inner">
                                            <div class="about__thumb-image floating-content">
                                                <img decoding="async" style="height: 298px;" src="https://images.unsplash.com/photo-1547082299-de196ea013d6?q=80&w=600&auto=format&fit=crop" alt="Web Development">
                                                <div class="floating-content__top-left">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>10 Years</h3>
                                                        <p>Consulting Experience</p>
                                                    </div> -->
                                                </div>
                                                <div class="floating-content__bottom-right">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>25K+</h3>
                                                        <p>Satisfied Customers</p>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Future technology of metaverse -->
                <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="our-values" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                    <div class="e-con-inner sectioncards">
                        <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                                <div class="elementor-widget-container">
                                    <script>
                                        jQuery(document).ready(function($) {

                                            AOS.init();

                                        });

                                    </script>
                                    <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                        <div class="about__thumb-inner">
                                            <div class="about__thumb-image floating-content">
                                                <img decoding="async" style="height: 298px;" src="https://images.unsplash.com/photo-1639762681057-408e52192e55?q=80&w=600&auto=format&fit=crop" alt="Future Technology">
                                                <div class="floating-content__top-left">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>10 Years</h3>
                                                        <p>Consulting Experience</p>
                                                    </div> -->
                                                </div>
                                                <div class="floating-content__bottom-right">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>25K+</h3>
                                                        <p>Satisfied Customers</p>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <h2 class="elementor-heading-title elementor-size-default">
                                        8
                                        <span style="color: var(--secondary-color);">AI-Powered</span>
                                        Predictive Modeling
                                    </h2>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <p class="elementor-heading-title elementor-size-default">
                                        We integrate state-of-the-art predictive analytics to forecast market directions. By processing millions of historical data points, sentiment metrics, and liquidity flows, GWI's neural network engines identify high-probability yield opportunities before they manifest in the market.
                                    </p>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                                <div class="elementor-widget-container">
                                    <!-- <a
                                        href="/dark/about-us/"
                                        target="_self"
                                        rel="nofollow"
                                        class="trk-btn trk-btn--border trk-btn--primary"
                                    >
                                        More
                                    </a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif



                @if ($page == 'web3')
                <!-- Decentralization -->
                <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="our-vision" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                    <div class="e-con-inner sectioncards sec-top-img">
                        <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <h2 class="elementor-heading-title banner-title elementor-size-default">
                                        1
                                        <span style="color: var(--secondary-color);">Decentralization</span>
                                    </h2>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <p class="elementor-heading-title elementor-size-small about-p" style="font-size: 13px;">
                                        Decentralization lies at the core of GWI's architecture. By removing centralized intermediaries and relying on smart contract code, we eliminate single points of failure, reduce transaction fees, and ensure censorship-resistant yield generation for all stakers.
                                    </p>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                                <div class="elementor-widget-container">
                                    <!-- <a
                                       href="/dark/about-us/"
                                        target="_self"
                                        rel="nofollow"
                                        style="background-color: #f9a826ff;"
                                        class="trk-btn trk-btn--border trk-btn--primary"
                                    >
                                        More
                                    </a> -->
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                                <div class="elementor-widget-container">
                                    <script>
                                        jQuery(document).ready(function($) {

                                            AOS.init();

                                        });

                                    </script>
                                    <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                        <div class="about__thumb-inner">
                                            <div class="about__thumb-image floating-content">
                                                <img decoding="async" style="height: 298px;" src="https://images.unsplash.com/photo-1621504450181-5d3868e9df74?q=80&w=600&auto=format&fit=crop" alt="Decentralization">
                                                <div class="floating-content__top-left">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>10 Years</h3>
                                                        <p>Consulting Experience</p>
                                                    </div> -->
                                                </div>
                                                <div class="floating-content__bottom-right">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>25K+</h3>
                                                        <p>Satisfied Customers</p>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Blockchain Technologies -->
                <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="our-vision" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                    <div class="e-con-inner sectioncards sec-top-img">
                        <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                                <div class="elementor-widget-container">
                                    <script>
                                        jQuery(document).ready(function($) {

                                            AOS.init();

                                        });

                                    </script>
                                    <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                        <div class="about__thumb-inner">
                                            <div class="about__thumb-image floating-content">
                                                <img decoding="async" style="height: 298px;" src="https://images.unsplash.com/photo-1622630998477-20aa696ecb05?q=80&w=600&auto=format&fit=crop" alt="Blockchain Technologies">
                                                <div class="floating-content__top-left">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>10 Years</h3>
                                                        <p>Consulting Experience</p>
                                                    </div> -->
                                                </div>
                                                <div class="floating-content__bottom-right">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>25K+</h3>
                                                        <p>Satisfied Customers</p>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <h2 class="elementor-heading-title banner-title elementor-size-default">
                                        2
                                        <span style="color: var(--secondary-color);">Blockchain Technologies</span>
                                    </h2>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <p class="elementor-heading-title elementor-size-small about-p" style="font-size: 13px;">
                                        GWI operates validator nodes across multiple leading Layer-1 and Layer-2 blockchains. This direct consensus-level participation secures network integrity and captures validator inflation yield directly for our staking pools.
                                    </p>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                                <div class="elementor-widget-container">
                                    <!-- <a
                                       href="/dark/about-us/"
                                        target="_self"
                                        rel="nofollow"
                                        style="background-color: #f9a826ff;"
                                        class="trk-btn trk-btn--border trk-btn--primary"
                                    >
                                        More
                                    </a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Token-Based Economics -->
                <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="our-vision" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                    <div class="e-con-inner sectioncards sec-top-img">
                        <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <h2 class="elementor-heading-title banner-title elementor-size-default">
                                        3
                                        <span style="color: var(--secondary-color);">Token-Based Economics</span>
                                    </h2>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <p class="elementor-heading-title elementor-size-small about-p" style="font-size: 13px;">
                                        GWI's tokenomics are engineered to incentivize long-term participation and yield compounding. Through structured buyback-and-burn mechanics and validator-revenue sharing, our native utility token creates sustained alignment between the protocol and investors.
                                    </p>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                                <div class="elementor-widget-container">
                                    <!-- <a
                                       href="/dark/about-us/"
                                        target="_self"
                                        rel="nofollow"
                                        style="background-color: #f9a826ff;"
                                        class="trk-btn trk-btn--border trk-btn--primary"
                                    >
                                        More
                                    </a> -->
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                                <div class="elementor-widget-container">
                                    <script>
                                        jQuery(document).ready(function($) {

                                            AOS.init();

                                        });

                                    </script>
                                    <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                        <div class="about__thumb-inner">
                                            <div class="about__thumb-image floating-content">
                                                <img decoding="async" style="height: 298px;" src="https://images.unsplash.com/photo-1621416894569-0f39ed31d247?q=80&w=600&auto=format&fit=crop" alt="Token Economics">
                                                <div class="floating-content__top-left">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>10 Years</h3>
                                                        <p>Consulting Experience</p>
                                                    </div> -->
                                                </div>
                                                <div class="floating-content__bottom-right">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>25K+</h3>
                                                        <p>Satisfied Customers</p>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ownership and Empowerment -->
                <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="our-vision" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                    <div class="e-con-inner sectioncards sec-top-img">
                        <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                                <div class="elementor-widget-container">
                                    <script>
                                        jQuery(document).ready(function($) {

                                            AOS.init();

                                        });

                                    </script>
                                    <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                        <div class="about__thumb-inner">
                                            <div class="about__thumb-image floating-content">
                                                <img decoding="async" style="height: 298px;" src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=600&auto=format&fit=crop" alt="Ownership and Empowerment">
                                                <div class="floating-content__top-left">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>10 Years</h3>
                                                        <p>Consulting Experience</p>
                                                    </div> -->
                                                </div>
                                                <div class="floating-content__bottom-right">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>25K+</h3>
                                                        <p>Satisfied Customers</p>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <h2 class="elementor-heading-title banner-title elementor-size-default">
                                        4
                                        <span style="color: var(--secondary-color);">Ownership and Empowerment</span>
                                    </h2>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <p class="elementor-heading-title elementor-size-small about-p" style="font-size: 13px;">
                                        We believe in sovereign capital control. GWI's staking smart contracts guarantee that users retain ultimate ownership of their staked assets, with transparent reward distribution logs verified in real-time on-chain.
                                    </p>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                                <div class="elementor-widget-container">
                                    <!-- <a
                                       href="/dark/about-us/"
                                        target="_self"
                                        rel="nofollow"
                                        style="background-color: #f9a826ff;"
                                        class="trk-btn trk-btn--border trk-btn--primary"
                                    >
                                        More
                                    </a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif


                <!-- Our IncomePlans -->
                @if ($page == 'all' || $page == 'ourmission')
                <div class="stticky">
                    <div class="stticky-text">Income Plans</div>
                    <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="our-vision" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                        <div class="e-con-inner sectioncards">
                            <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                                <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                                    <div class="elementor-widget-container">
                                        <h2 class="elementor-heading-title banner-title elementor-size-default">
                                            Income
                                            <span style="color: var(--secondary-color);">Plan</span>
                                        </h2>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                                    <div class="elementor-widget-container">
                                        <p class="elementor-heading-title elementor-size-default about-p">
                                            "Discover our comprehensive Income Plan, meticulously designed to simplify your path to long-term financial prosperity. We offer a structured and highly reward-based system tailored for modern earners seeking stable, predictable, and scalable wealth generation. Our ecosystem provides diverse avenues to participate and earn, empowering community members to optimize their digital asset portfolios while securing the validation network. There are 5 distinct types of income:
                                            <br>
                                            <br>
                                            <span>1. Staking Profit</span>
                                            <br>
                                            <span>2. Referral Income</span>
                                            <br>
                                            <span>3. Level Income</span>
                                            <br>
                                            <span>4. Auto Pool Income</span>
                                            <br>
                                            <span>5. Team Building Bonus</span>"
                                        </p>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                                    <div class="elementor-widget-container">
                                        <a href="/?page=incomeplan" target="_self" rel="nofollow" style="background-color: #f9a826ff; border-color: #f9a826ff;" class="trk-btn trk-btn--border trk-btn--primary">
                                            View All
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                                <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                                    <div class="elementor-widget-container">
                                        <script>
                                            jQuery(document).ready(function($) {

                                                AOS.init();

                                            });

                                        </script>
                                        <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                            <div class="about__thumb-inner">
                                                <div class="about__thumb-image floating-content">
                                                    <img decoding="async" style="height: 298px;" src="https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?q=80&w=600&auto=format&fit=crop" alt="Plan">
                                                    <div class="floating-content__top-left">
                                                        <!-- <div class="floating-content__item">
                                                        <h3>10 Years</h3>
                                                        <p>Consulting Experience</p>
                                                    </div> -->
                                                    </div>
                                                    <div class="floating-content__bottom-right">
                                                        <!-- <div class="floating-content__item">
                                                        <h3>25K+</h3>
                                                        <p>Satisfied Customers</p>
                                                    </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @if ($page == 'all')
            </div>
            @endif


            @if ($page == 'incomeplan')
            <!-- Staking Profit -->
            <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="our-vision" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                <div class="e-con-inner sectioncards">
                    <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                        <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                            <div class="elementor-widget-container">
                                <h2 class="elementor-heading-title banner-title elementor-size-default">
                                    Staking
                                    <span style="color: var(--secondary-color);">Yields</span>
                                </h2>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                            <div class="elementor-widget-container">
                                <p class="elementor-heading-title elementor-size-default about-p">
                                    <br>
                                    <br>
                                    <span>15% Monthly Staking Yield (Paid Daily)</span>
                                    <br>
                                    <span>Staking Period: 15 Months</span>
                                </p>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                            <div class="elementor-widget-container">
                                <!-- <a
                                       href="/?page=ourproject"
                                        target="_self"
                                        rel="nofollow"
                                        style="background-color: #f9a826ff; border-color: #f9a826ff;"
                                        class="trk-btn trk-btn--border trk-btn--primary"
                                    >
                                        View All
                                    </a> -->
                            </div>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                        <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                            <div class="elementor-widget-container">
                                <script>
                                    jQuery(document).ready(function($) {

                                        AOS.init();

                                    });

                                </script>
                                <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                    <div class="about__thumb-inner">
                                        <div class="about__thumb-image floating-content">
                                            <img decoding="async" style="height: 298px;" src="https://images.unsplash.com/photo-1559526324-4b87b5e36e44?q=80&w=600&auto=format&fit=crop" alt="Staking Profit">
                                            <div class="floating-content__top-left">
                                                <!-- <div class="floating-content__item">
                                                        <h3>10 Years</h3>
                                                        <p>Consulting Experience</p>
                                                    </div> -->
                                            </div>
                                            <div class="floating-content__bottom-right">
                                                <!-- <div class="floating-content__item">
                                                        <h3>25K+</h3>
                                                        <p>Satisfied Customers</p>
                                                    </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Referral Income -->
            <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="our-vision" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                <div class="e-con-inner sectioncards">
                    <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                        <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                            <div class="elementor-widget-container">
                                <script>
                                    jQuery(document).ready(function($) {

                                        AOS.init();

                                    });

                                </script>
                                <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                    <div class="about__thumb-inner">
                                        <div class="about__thumb-image floating-content">
                                            <img decoding="async" style="height: 298px;" src="https://images.unsplash.com/photo-1579621970795-87faff2f9050?q=80&w=600&auto=format&fit=crop" alt="Referral Income">
                                            <div class="floating-content__top-left">
                                                <!-- <div class="floating-content__item">
                                                    <h3>10 Years</h3>
                                                    <p>Consulting Experience</p>
                                                </div> -->
                                            </div>
                                            <div class="floating-content__bottom-right">
                                                <!-- <div class="floating-content__item">
                                                    <h3>25K+</h3>
                                                    <p>Satisfied Customers</p>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                        <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                            <div class="elementor-widget-container">
                                <h2 class="elementor-heading-title banner-title elementor-size-default">
                                    Direct
                                    <span style="color: var(--secondary-color);">Affiliate Reward</span>
                                </h2>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                            <div class="elementor-widget-container">
                                <p class="elementor-heading-title elementor-size-default about-p">
                                    <br>
                                    <br>
                                    <span>Earn 10% Direct Referral Commission instantly on all sponsored staking volumes.</span>
                                    <br>
                                </p>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                            <div class="elementor-widget-container">
                                <!-- <a
                                   href="/?page=ourproject"
                                    target="_self"
                                    rel="nofollow"
                                    style="background-color: #f9a826ff; border-color: #f9a826ff;"
                                    class="trk-btn trk-btn--border trk-btn--primary"
                                >
                                    View All
                                </a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Rank Achievers -->
            <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="our-vision" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                <div class="e-con-inner sectioncards">
                    <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                        <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                            <div class="elementor-widget-container">
                                <h2 class="elementor-heading-title banner-title elementor-size-default">
                                    Rank
                                    <span style="color: var(--secondary-color);">Achievers</span>
                                </h2>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                            <div class="elementor-widget-container">
                                <p class="elementor-heading-title elementor-size-default about-p">
                                    <br>
                                    <br>
                                    1. <span>Gold Staker - </span><span style="color: #f9a826ff !important;">Minimum 100 USDT Stake</span>
                                    <br>
                                    2. <span>Global Promoter - </span><span style="color: #f9a826ff !important;">Minimum 10 Direct Active Stakers</span>
                                    <br>
                                    3. <span>Executive Director - </span><span style="color: #f9a826ff !important;">Maintain 2 Active Global Promoters</span>
                                    <br>
                                    4. <span>Elite Manager - </span><span style="color: #f9a826ff !important;">Maintain 2 Active Executive Directors</span>
                                    <br>
                                    5. <span>Diamond President - </span><span style="color: #f9a826ff !important;">Maintain 2 Active Elite Managers</span>
                                    <br>
                                </p>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                            <div class="elementor-widget-container">
                                <!-- <a
                               href="/?page=ourproject"
                                target="_self"
                                rel="nofollow"
                                style="background-color: #f9a826ff; border-color: #f9a826ff;"
                                class="trk-btn trk-btn--border trk-btn--primary"
                            >
                                View All
                            </a> -->
                            </div>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                        <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                            <div class="elementor-widget-container">
                                <script>
                                    jQuery(document).ready(function($) {

                                        AOS.init();

                                    });

                                </script>
                                <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                    <div class="about__thumb-image floating-content">
                                        <img decoding="async" style="height: 298px;" src="https://images.unsplash.com/photo-1579621970795-87faff2f9050?q=80&w=600&auto=format&fit=crop" alt="Staker Achievers">
                                        <div class="floating-content__top-left">
                                            <!-- <div class="floating-content__item">
                                                <h3>10 Years</h3>
                                                <p>Consulting Experience</p>
                                            </div> -->
                                        </div>
                                        <div class="floating-content__bottom-right">
                                            <!-- <div class="floating-content__item">
                                                <h3>25K+</h3>
                                                <p>Satisfied Customers</p>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Level Income -->
        <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="our-vision" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
            <div class="e-con-inner sectioncards">
                <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                    <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <h2 class="elementor-heading-title banner-title elementor-size-default">
                                Generational
                                <span style="color: var(--secondary-color);">Yield Dividends</span>
                            </h2>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <p class="elementor-heading-title elementor-size-default about-p">
                                <br>
                                <br>
                                1. <span>First Level - 10%</span>
                                <br>
                                2. <span>Second Level - 5%</span>
                                <br>
                                3. <span>Third Level - 5%</span>
                                <br>
                                4. <span>Fourth Level - 5%</span>
                                <br>
                                5. <span>Fifth Level - 5%</span>
                                <br>

                                <span style="color: #f9a826ff !important;">Unlocked for Executive Directors (2 Direct Global Promoters)</span>
                                <br>
                                6. <span>Sixth Level - 5%</span>
                                <br>
                                7. <span>Seventh Level - 5%</span>
                                <br>

                                <span style="color: #f9a826ff !important;">Unlocked for Elite Managers (2 Direct Executive Directors)</span>
                                <br>
                                8. <span>Eighth Level - 5%</span>
                                <br>
                                9. <span>Ninth Level - 5%</span>
                                <br>

                                <span style="color: #f9a826ff !important;">Unlocked for Diamond Presidents (2 Direct Elite Managers)</span>
                                <br>
                                10. <span>Tenth Level - 5%</span>
                                <br>
                                11. <span>Eleventh Level - 5%</span>
                                <br>
                            </p>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                        <div class="elementor-widget-container">
                            <!-- <a
                                   href="/?page=ourproject"
                                    target="_self"
                                    rel="nofollow"
                                    style="background-color: #f9a826ff; border-color: #f9a826ff;"
                                    class="trk-btn trk-btn--border trk-btn--primary"
                                >
                                    View All
                                </a> -->
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                    <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                        <div class="elementor-widget-container">
                            <script>
                                jQuery(document).ready(function($) {

                                    AOS.init();

                                });

                            </script>
                            <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                <div class="about__thumb-image floating-content">
                                    <img decoding="async" style="height: 298px;" src="https://images.unsplash.com/photo-1579621970795-87faff2f9050?q=80&w=600&auto=format&fit=crop" alt="Referral Dividend">
                                    <div class="floating-content__top-left">
                                        <!-- <div class="floating-content__item">
                                                    <h3>10 Years</h3>
                                                    <p>Consulting Experience</p>
                                                </div> -->
                                    </div>
                                    <div class="floating-content__bottom-right">
                                        <!-- <div class="floating-content__item">
                                                    <h3>25K+</h3>
                                                    <p>Satisfied Customers</p>
                                                </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>


        <!-- Compounding -->
        <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="our-vision" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
            <div class="e-con-inner sectioncards">
                <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                    <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                        <div class="elementor-widget-container">
                            <script>
                                jQuery(document).ready(function($) {

                                    AOS.init();

                                });

                            </script>
                            <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                <div class="about__thumb-image floating-content">
                                    <img decoding="async" style="height: 298px;" src="https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?q=80&w=600&auto=format&fit=crop" alt="Compounding Achievers">
                                    <div class="floating-content__top-left">
                                        <!-- <div class="floating-content__item">
                                                    <h3>10 Years</h3>
                                                    <p>Consulting Experience</p>
                                                </div> -->
                                    </div>
                                    <div class="floating-content__bottom-right">
                                        <!-- <div class="floating-content__item">
                                                    <h3>25K+</h3>
                                                    <p>Satisfied Customers</p>
                                                </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h2 class="elementor-heading-title banner-title elementor-size-default">
                            Staking
                            <span style="color: var(--secondary-color);">Compounding</span>
                        </h2>
                    </div>
                </div>
                <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <p class="elementor-heading-title elementor-size-default about-p">
                            <br>
                            <br>
                            <span>Accelerated Compounding Model: 6-Month Auto-Reinvestment Cycle to maximize annual percentage yields (APY).</span>
                            <br>
                        </p>
                    </div>
                </div>
                <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                    <div class="elementor-widget-container">
                        <!-- <a
                                   href="/?page=ourproject"
                                    target="_self"
                                    rel="nofollow"
                                    style="background-color: #f9a826ff; border-color: #f9a826ff;"
                                    class="trk-btn trk-btn--border trk-btn--primary"
                                >
                                    View All
                                </a> -->
                    </div>
                </div>
            </div>
        </div>
        </div>


        <!-- Reward System -->
        <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="our-vision" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
            <div class="e-con-inner sectioncards">
                <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                    <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <h2 class="elementor-heading-title banner-title elementor-size-default">
                                Reward
                                <span style="color: var(--secondary-color);">System</span>
                            </h2>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <p class="elementor-heading-title elementor-size-default about-p">
                                <br>
                                1. <span>Goa Luxury Retreat (10k USDT Direct Volume)</span>
                                <br>
                                2. <span>Dubai VIP Gala (100k USDT 5-Level Volume)</span>
                                <br>
                                3. <span>Mid-Segment Executive Sedan (1M USDT 10-Level Volume)</span>
                                <br>
                                4. <span>Premium Luxury SUV (2.5M USDT 10-Level Volume)</span>
                                <br>
                                5. <span>Ultra-Luxury Mercedes-AMG (5M USDT 10-Level Volume)</span>
                                <br>
                            </p>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                        <div class="elementor-widget-container">
                            <a href="/?page=reward" target="_self" rel="nofollow" style="background-color: #f9a826ff; border-color: #f9a826ff;" class="trk-btn trk-btn--border trk-btn--primary">
                                View All
                            </a>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                    <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                        <div class="elementor-widget-container">
                            <script>
                                jQuery(document).ready(function($) {

                                    AOS.init();

                                });

                            </script>
                            <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                <div class="about__thumb-inner">
                                    <div class="about__thumb-image floating-content">
                                        <img decoding="async" style="height: 298px; object-fit: cover;" src="https://images.unsplash.com/photo-1578269174936-2709b5a19aea?auto=format&fit=crop&w=600&q=80" alt="Reward System">
                                        <div class="floating-content__top-left">
                                            <!-- <div class="floating-content__item">
                                                <h3>10 Years</h3>
                                                <p>Consulting Experience</p>
                                            </div> -->
                                        </div>
                                        <div class="floating-content__bottom-right">
                                            <!-- <div class="floating-content__item">
                                                <h3>25K+</h3>
                                                <p>Satisfied Customers</p>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif



        @if ($page == 'reward')
        <!-- GOA -->
        <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="our-vision" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
            <div class="e-con-inner sectioncards">
                <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                    <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <h2 class="elementor-heading-title banner-title elementor-size-default">
                                GOA LUXURY
                                <span style="color: var(--secondary-color);">RETREAT</span>
                            </h2>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <p class="elementor-heading-title elementor-size-default about-p">
                                <br>
                                <span>Qualification Window: Within 30 days of registration</span>
                                <br>
                                <br>
                                <span>Target: 10,000 USDT in Direct Referral Volume</span>
                                <br>
                                <br>
                                <span>Reward: Fully-sponsored 3 Days / 2 Nights VIP Goa Experience</span>
                                <br>
                                <br>
                                <span>Structure: Direct sales volume only</span>
                            </p>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                        <div class="elementor-widget-container">
                            <!-- <a
                              href="/?page=ourproject"
                               target="_self"
                               rel="nofollow"
                               style="background-color: #f9a826ff; border-color: #f9a826ff;"
                               class="trk-btn trk-btn--border trk-btn--primary"
                           >
                               View All
                           </a> -->
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                    <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                        <div class="elementor-widget-container">
                            <script>
                                jQuery(document).ready(function($) {

                                    AOS.init();

                                });

                            </script>
                            <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                <div class="about__thumb-inner">
                                    <div class="about__thumb-image floating-content">
                                        <img decoding="async" style="height: 298px; object-fit: cover;" src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=600&q=80" alt="Goa Trip">
                                        <div class="floating-content__top-left">
                                            <!-- <div class="floating-content__item">
                                               <h3>10 Years</h3>
                                               <p>Consulting Experience</p>
                                           </div> -->
                                        </div>
                                        <div class="floating-content__bottom-right">
                                            <!-- <div class="floating-content__item">
                                               <h3>25K+</h3>
                                               <p>Satisfied Customers</p>
                                           </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- DUBAI -->
        <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="our-vision" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
            <div class="e-con-inner sectioncards">
                <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                    <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                        <div class="elementor-widget-container">
                            <script>
                                jQuery(document).ready(function($) {

                                    AOS.init();

                                });

                            </script>
                            <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                <div class="about__thumb-inner">
                                    <div class="about__thumb-image floating-content">
                                        <img decoding="async" style="height: 298px; object-fit: cover;" src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?auto=format&fit=crop&w=600&q=80" alt="Dubai Trip">
                                        <div class="floating-content__top-left">
                                            <!-- <div class="floating-content__item">
                                               <h3>10 Years</h3>
                                               <p>Consulting Experience</p>
                                           </div> -->
                                        </div>
                                        <div class="floating-content__bottom-right">
                                            <!-- <div class="floating-content__item">
                                               <h3>25K+</h3>
                                               <p>Satisfied Customers</p>
                                           </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                    <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <h2 class="elementor-heading-title banner-title elementor-size-default">
                                DUBAI ELITE
                                <span style="color: var(--secondary-color);">VIP GALA</span>
                            </h2>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <p class="elementor-heading-title elementor-size-default about-p">
                                <br>
                                <br>
                                <span>Target: 100,000 USDT in Cumulative Sales Volume</span>
                                <br>
                                <br>
                                <span>Reward: All-inclusive 4 Days / 3 Nights Luxury Dubai Tour & Annual VIP Gala</span>
                                <br>
                                <br>
                                <span>Structure: Calculated across 5 referral levels</span>
                            </p>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                        <div class="elementor-widget-container">
                            <!-- <a
                              href="/?page=ourproject"
                               target="_self"
                               rel="nofollow"
                               style="background-color: #f9a826ff; border-color: #f9a826ff;"
                               class="trk-btn trk-btn--border trk-btn--primary"
                           >
                               View All
                           </a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Swift -->
        <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="our-vision" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
            <div class="e-con-inner sectioncards">
                <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                    <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <h2 class="elementor-heading-title banner-title elementor-size-default">
                                MID-SEGMENT
                                <span style="color: var(--secondary-color);">EXECUTIVE SEDAN</span>
                            </h2>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <p class="elementor-heading-title elementor-size-default about-p">
                                <br>
                                <br>
                                <span>Target: 1,000,000 USDT in Cumulative Sales Volume</span>
                                <br>
                                <br>
                                <span>Reward: Executive Class Sedan (Valued at 7,000 USDT)</span>
                                <br>
                                <br>
                                <span>Structure: Calculated across 10 referral levels</span>
                            </p>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                        <div class="elementor-widget-container">
                            <!-- <a
                              href="/?page=ourproject"
                               target="_self"
                               rel="nofollow"
                               style="background-color: #f9a826ff; border-color: #f9a826ff;"
                               class="trk-btn trk-btn--border trk-btn--primary"
                           >
                               View All
                           </a> -->
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                    <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                        <div class="elementor-widget-container">
                            <script>
                                jQuery(document).ready(function($) {

                                    AOS.init();

                                });

                            </script>
                            <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                <div class="about__thumb-inner">
                                    <div class="about__thumb-image floating-content">
                                        <img decoding="async" style="height: 298px; object-fit: cover;" src="https://images.unsplash.com/photo-1541899481282-d53bffe3c35d?auto=format&fit=crop&w=600&q=80" alt="Mid-Segment Car">
                                        <div class="floating-content__top-left">
                                            <!-- <div class="floating-content__item">
                                               <h3>10 Years</h3>
                                               <p>Consulting Experience</p>
                                           </div> -->
                                        </div>
                                        <div class="floating-content__bottom-right">
                                            <!-- <div class="floating-content__item">
                                               <h3>25K+</h3>
                                               <p>Satisfied Customers</p>
                                           </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- volkswagen or Honda Elevate -->
        <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="our-vision" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
            <div class="e-con-inner sectioncards">
                <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                    <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                        <div class="elementor-widget-container">
                            <script>
                                jQuery(document).ready(function($) {

                                    AOS.init();

                                });

                            </script>
                            <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                <div class="about__thumb-inner">
                                    <div class="about__thumb-image floating-content">
                                        <img decoding="async" style="height: 198px; object-fit: cover;" src="https://images.unsplash.com/photo-1549399542-7e3f8b79c341?auto=format&fit=crop&w=600&q=80" alt="Premium Car 1">
                                        <div class="floating-content__top-left">
                                            <!-- <div class="floating-content__item">
                                               <h3>10 Years</h3>
                                               <p>Consulting Experience</p>
                                           </div> -->
                                        </div>
                                        <div class="floating-content__bottom-right">
                                            <!-- <div class="floating-content__item">
                                               <h3>25K+</h3>
                                               <p>Satisfied Customers</p>
                                           </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                    <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                        <div class="elementor-widget-container">
                            <script>
                                jQuery(document).ready(function($) {

                                    AOS.init();

                                });

                            </script>
                            <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                <div class="about__thumb-inner">
                                    <div class="about__thumb-image floating-content">
                                        <img decoding="async" style="height: 198px; object-fit: cover;" src="https://images.unsplash.com/photo-1580273916550-e323be2ae537?auto=format&fit=crop&w=600&q=80" alt="Premium Car 2">
                                        <div class="floating-content__top-left">
                                            <!-- <div class="floating-content__item">
                                               <h3>10 Years</h3>
                                               <p>Consulting Experience</p>
                                           </div> -->
                                        </div>
                                        <div class="floating-content__bottom-right">
                                            <!-- <div class="floating-content__item">
                                               <h3>25K+</h3>
                                               <p>Satisfied Customers</p>
                                           </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                    <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <h2 class="elementor-heading-title banner-title elementor-size-default">
                                PREMIUM LUXURY
                                <span style="color: var(--secondary-color);">SUV</span>
                            </h2>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <p class="elementor-heading-title elementor-size-default about-p">
                                <br>
                                <br>
                                <span>Target: 2,500,000 USDT in Cumulative Sales Volume</span>
                                <br>
                                <br>
                                <span>Reward: Luxury Class SUV (Valued at 15,000 USDT)</span>
                                <br>
                                <br>
                                <span>Structure: Calculated across 10 referral levels</span>
                            </p>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                        <div class="elementor-widget-container">
                            <!-- <a
                              href="/?page=ourproject"
                               target="_self"
                               rel="nofollow"
                               style="background-color: #f9a826ff; border-color: #f9a826ff;"
                               class="trk-btn trk-btn--border trk-btn--primary"
                           >
                               View All
                           </a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- BENZ -->
        <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="our-vision" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
            <div class="e-con-inner sectioncards">
                <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                    <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <h2 class="elementor-heading-title banner-title elementor-size-default">
                                ULTRA-LUXURY
                                <span style="color: var(--secondary-color);">MERCEDES-AMG</span>
                            </h2>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <p class="elementor-heading-title elementor-size-default about-p">
                                <br>
                                <br>
                                <span>Target: 5,000,000 USDT in Cumulative Sales Volume</span>
                                <br>
                                <br>
                                <span>Reward: High-Performance Supercar / Mercedes-AMG (Valued at 50,000 USDT)</span>
                                <br>
                                <br>
                                <span>Structure: Calculated across 10 referral levels</span>
                            </p>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                        <div class="elementor-widget-container">
                            <!-- <a
                              href="/?page=ourproject"
                               target="_self"
                               rel="nofollow"
                               style="background-color: #f9a826ff; border-color: #f9a826ff;"
                               class="trk-btn trk-btn--border trk-btn--primary"
                           >
                               View All
                           </a> -->
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                    <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                        <div class="elementor-widget-container">
                            <script>
                                jQuery(document).ready(function($) {

                                    AOS.init();

                                });

                            </script>
                            <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                <div class="about__thumb-inner">
                                    <div class="about__thumb-image floating-content">
                                        <img decoding="async" style="height: 298px; object-fit: cover;" src="https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?auto=format&fit=crop&w=600&q=80" alt="Luxury Car">
                                        <div class="floating-content__top-left">
                                            <!-- <div class="floating-content__item">
                                               <h3>10 Years</h3>
                                               <p>Consulting Experience</p>
                                           </div> -->
                                        </div>
                                        <div class="floating-content__bottom-right">
                                            <!-- <div class="floating-content__item">
                                               <h3>25K+</h3>
                                               <p>Satisfied Customers</p>
                                           </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif



        <!-- GWI Academy -->
        @if ($page == 'ourmission')
        <div class="stticky">
            <div class="stticky-text">GWI Academy</div>
            <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="gms-academy" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                <div class="e-con-inner sectioncards">
                    <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                        <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                            <div class="elementor-widget-container">
                                <h2 class="elementor-heading-title banner-title elementor-size-default">
                                    Curriculum in
                                    <span style="color: var(--secondary-color);">Quantitative Finance</span>
                                    and
                                    <span style="color: var(--secondary-color);">DeFi Staking</span>
                                </h2>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                            <style>
                                .gms-acdmy-p span {
                                    color: #fff;
                                    font-size: 18px !important;
                                    font-weight: 700 !important;
                                }

                            </style>
                            <div class="elementor-widget-container gms-acdmy-p">
                                <p>
                                    GWI Academy offers a specialized curriculum designed for digital asset managers, high-frequency traders, and decentralized protocol validators. Our courses cover state-of-the-art blockchain technology and quantitative financial strategies, equipping stakers with the knowledge needed to thrive in Web3. Core modules include:
                                </p>
                                <span class="elementor-heading-title banner-title elementor-size-default">
                                    Introduction to Decentralized Staking
                                </span>
                                <p>
                                    An in-depth exploration of Proof-of-Stake (PoS) consensus algorithms, liquidity validation, node operations, and the economic mechanisms that safeguard multi-chain protocols. Learn how validator networks verify blocks and secure yields.
                                </p>

                                <span class="elementor-heading-title banner-title elementor-size-default">
                                    Quantitative Arbitrage & Algorithmic Trading
                                </span>
                                <p>
                                    Understand the fundamentals of mathematical modeling in financial markets, high-frequency trading (HFT) infrastructure, triangular cross-exchange arbitrage, and the integration of machine learning pipelines for real-time market sentiment detection.
                                </p>

                                <span class="elementor-heading-title banner-title elementor-size-default">
                                    Smart Contract Auditing & Security Protocols
                                </span>
                                <p>
                                    Study vulnerability detection, formal verification techniques, and defensive programming for decentralized applications (DApps). Analyze historic protocol exploits to master security best practices in Solidity and Rust.
                                </p>

                                <span class="elementor-heading-title banner-title elementor-size-default">
                                    Advanced Tokenomics & Digital Asset Valuation
                                </span>
                                <p>
                                    Analyze supply-demand dynamics, inflation/deflation schedules, liquid staking derivatives (LSDs), yield optimization vaults, and governance framework designs that determine the utility and long-term valuation of crypto assets.
                                </p>

                                <span class="elementor-heading-title banner-title elementor-size-default">
                                    Risk Management & Hedging Strategies
                                </span>
                                <p>
                                    Master capital preservation techniques under high market volatility. Learn to execute automated delta-neutral strategies, leverage derivatives contracts (futures & options), and configure multi-tier collateral management dashboards.
                                </p>

                                <span class="elementor-heading-title banner-title elementor-size-default">
                                    Careers in Decentralized Finance (DeFi)
                                </span>
                                <p>
                                    Decentralized Finance is a rapidly expanding sector with high demand for technical and analytical talent. GWI Academy bridges the gap between traditional banking and distributed systems, preparing you for leadership roles in the digital economy.
                                    Whether you aim to become a Smart Contract Engineer, a Quantitative Analyst, or a Protocol Architect, our hands-on labs provide the practical experience required. Our graduates occupy positions in major validator pools, audit firms, and algorithmic hedge funds globally. We also offer tailored consulting training for partners managing large private validator nodes, ensuring seamless operations, institutional compliance, and optimized execution pipelines.
                                </p>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                            <div class="elementor-widget-container">
                                <!--  <a
                                       href="/dark/about-us/"
                                        target="_self"
                                        rel="nofollow"
                                        style="background-color: #f9a826ff;"
                                        class="trk-btn trk-btn--border trk-btn--primary"
                                    >
                                        More
                                    </a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <style>
            @media (min-width: 768px) {
                .elementor-67 .elementor-element.elementor-element-f496e11 {
                    --width: 75%;
                }
            }

            @media (max-width: 768px) {
                .elementor-67 .elementor-element.elementor-element-f496e11 {
                    --width: 92%;
                }
            }

        </style>

        <!-- academy images -->
        @if ($page == 'ourmission')
        <div class="stticky">
            <div class="stticky-text">GWI Academy</div>
            <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="our-values" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                <div class="e-con-inner">
                    <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                        <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                            <div class="elementor-widget-container">
                                <script>
                                    jQuery(document).ready(function($) {

                                        AOS.init();

                                    });

                                </script>
                                <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                    <div class="about__thumb-inner">
                                        <div class="about__thumb-image floating-content">
                                            <img decoding="async" style="height: 200px; width:100%; object-fit: cover;" src="https://images.unsplash.com/photo-1590283603385-17ffb3a7f29f?auto=format&fit=crop&w=600&q=80" alt="Academy 1">
                                            <div class="floating-content__top-left">
                                                <!-- <div class="floating-content__item">
                                                        <h3>10 Years</h3>
                                                        <p>Consulting Experience</p>
                                                    </div> -->
                                            </div>
                                            <div class="floating-content__bottom-right">
                                                <!-- <div class="floating-content__item">
                                                        <h3>25K+</h3>
                                                        <p>Satisfied Customers</p>
                                                    </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                        <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                            <div class="elementor-widget-container">
                                <script>
                                    jQuery(document).ready(function($) {

                                        AOS.init();

                                    });

                                </script>
                                <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                    <div class="about__thumb-inner">
                                        <div class="about__thumb-image floating-content">
                                            <img decoding="async" style="height: 200px; width:100%; object-fit: cover;" src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=600&q=80" alt="Academy 2">
                                            <div class="floating-content__top-left">
                                                <!-- <div class="floating-content__item">
                                                        <h3>10 Years</h3>
                                                        <p>Consulting Experience</p>
                                                    </div> -->
                                            </div>
                                            <div class="floating-content__bottom-right">
                                                <!-- <div class="floating-content__item">
                                                        <h3>25K+</h3>
                                                        <p>Satisfied Customers</p>
                                                    </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                        <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                            <div class="elementor-widget-container">
                                <script>
                                    jQuery(document).ready(function($) {

                                        AOS.init();

                                    });

                                </script>
                                <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                    <div class="about__thumb-inner">
                                        <div class="about__thumb-image floating-content">
                                            <img decoding="async" style="height: 200px; width:100%; object-fit: cover;" src="https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?auto=format&fit=crop&w=600&q=80" alt="Academy 3">
                                            <div class="floating-content__top-left">
                                                <!-- <div class="floating-content__item">
                                                        <h3>10 Years</h3>
                                                        <p>Consulting Experience</p>
                                                    </div> -->
                                            </div>
                                            <div class="floating-content__bottom-right">
                                                <!-- <div class="floating-content__item">
                                                        <h3>25K+</h3>
                                                        <p>Satisfied Customers</p>
                                                    </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- academy images -->
        @if ($page == 'ourmission')
        <div class="stticky">
            <div class="stticky-text">GWI Academy</div>
            <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="our-values" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                <div class="e-con-inner">
                    <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                        <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                            <div class="elementor-widget-container">
                                <script>
                                    jQuery(document).ready(function($) {

                                        AOS.init();

                                    });

                                </script>
                                <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                    <div class="about__thumb-inner">
                                        <div class="about__thumb-image floating-content">
                                            <img decoding="async" style="height: 200px; width:100%; object-fit: cover;" src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=600&q=80" alt="Academy 4">
                                            <div class="floating-content__top-left">
                                                <!-- <div class="floating-content__item">
                                                        <h3>10 Years</h3>
                                                        <p>Consulting Experience</p>
                                                    </div> -->
                                            </div>
                                            <div class="floating-content__bottom-right">
                                                <!-- <div class="floating-content__item">
                                                        <h3>25K+</h3>
                                                        <p>Satisfied Customers</p>
                                                    </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                        <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                            <div class="elementor-widget-container">
                                <script>
                                    jQuery(document).ready(function($) {

                                        AOS.init();

                                    });

                                </script>
                                <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                    <div class="about__thumb-inner">
                                        <div class="about__thumb-image floating-content">
                                            <img decoding="async" style="height: 200px; width:100%; object-fit: cover;" src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=600&q=80" alt="Academy 5">
                                            <div class="floating-content__top-left">
                                                <!-- <div class="floating-content__item">
                                                        <h3>10 Years</h3>
                                                        <p>Consulting Experience</p>
                                                    </div> -->
                                            </div>
                                            <div class="floating-content__bottom-right">
                                                <!-- <div class="floating-content__item">
                                                        <h3>25K+</h3>
                                                        <p>Satisfied Customers</p>
                                                    </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                        <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                            <div class="elementor-widget-container">
                                <script>
                                    jQuery(document).ready(function($) {

                                        AOS.init();

                                    });

                                </script>
                                <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                    <div class="about__thumb-inner">
                                        <div class="about__thumb-image floating-content">
                                            <img decoding="async" style="height: 200px; width:100%; object-fit: cover;" src="https://images.unsplash.com/photo-1559526324-4b87b5e36e44?auto=format&fit=crop&w=600&q=80" alt="Academy 6">
                                            <div class="floating-content__top-left">
                                                <!-- <div class="floating-content__item">
                                                        <h3>10 Years</h3>
                                                        <p>Consulting Experience</p>
                                                    </div> -->
                                            </div>
                                            <div class="floating-content__bottom-right">
                                                <!-- <div class="floating-content__item">
                                                        <h3>25K+</h3>
                                                        <p>Satisfied Customers</p>
                                                    </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif


        <!-- benefits -->
        @if ($page == 'all' || $page == 'ourmission')
        <div class="stticky">
            <div class="stticky-text">Benefits</div>
            <div class="elementor-element elementor-element-c1c4aaf e-con-full e-flex e-con e-parent" data-id="c1c4aaf" id="the-benefits" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}" data-core-v316-plus="true">
                <div class="elementor-element elementor-element-94c7ebe elementor-widget elementor-widget-offer-tab" data-id="94c7ebe" data-element_type="widget" data-widget_type="offer-tab.default">
                    <div class="elementor-widget-container">
                        <script>
                            jQuery(document).ready(function($) {

                                AOS.init();

                            });

                        </script>
                        <section class="feature feature--style1 padding-bottom padding-top bg-color">
                            <div class="container">
                                <div class="feature__wrapper">
                                    <div class="row g-5 align-items-center justify-content-between">
                                        <div class="col-md-6 col-lg-5">
                                            <div class="feature__content" data-aos="fade-right" data-aos-duration="800">
                                                <div class="feature__content-inner">
                                                    <div class="section-header">
                                                        <h2 class="mb-15 mt-minus-5">
                                                            <span style="color: var(--secondary-color)">Five</span>
                                                            Incomes We Offer
                                                        </h2>
                                                        <p class="mb-0">Maximize your financial growth with our five specialized, high-yield income streams designed to reward active staking, references, and network building.</p>
                                                    </div>
                                                    <div class="feature__nav">
                                                        <div class="nav nav--feature flex-column nav-pills" id="feat-pills-tab" role="tablist" aria-orientation="vertical">
                                                            <div class="nav-link active" id="tg-tab-0" data-bs-toggle="pill" data-bs-target="#tg-id-0" role="tab" aria-controls="tg-id-0" aria-selected="true">
                                                                <div class="feature__item">
                                                                    <div class="feature__item-inner">
                                                                        <div class="feature__item-content">
                                                                            <h6>Stake Income (0.5% Daily)</h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="nav-link" id="tg-tab-1" data-bs-toggle="pill" data-bs-target="#tg-id-1" role="tab" aria-controls="tg-id-1" aria-selected="false">
                                                                <div class="feature__item">
                                                                    <div class="feature__item-inner">
                                                                        <div class="feature__item-content">
                                                                            <h6>Referral Income (5%)</h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="nav-link" id="tg-tab-2" data-bs-toggle="pill" data-bs-target="#tg-id-2" role="tab" aria-controls="tg-id-2" aria-selected="false">
                                                                <div class="feature__item">
                                                                    <div class="feature__item-inner">
                                                                        <div class="feature__item-content">
                                                                            <h6>Level Income (1%)</h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="nav-link" id="tg-tab-3" data-bs-toggle="pill" data-bs-target="#tg-id-3" role="tab" aria-controls="tg-id-3" aria-selected="false">
                                                                <div class="feature__item">
                                                                    <div class="feature__item-inner">
                                                                        <div class="feature__item-content">
                                                                            <h6>Auto Pool Income (3x)</h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="nav-link" id="tg-tab-4" data-bs-toggle="pill" data-bs-target="#tg-id-4" role="tab" aria-controls="tg-id-4" aria-selected="false">
                                                                <div class="feature__item">
                                                                    <div class="feature__item-inner">
                                                                        <div class="feature__item-content">
                                                                            <h6>Team Building Bonus (1%)</h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <div class="feature__thumb pt-5 pt-md-0" data-aos="fade-left" data-aos-duration="800">
                                                <div class="feature__thumb-inner">
                                                    <div class="tab-content" id="feat-pills-tabContent">
                                                        <div class="tab-pane fade show active" id="tg-id-0" role="tabpanel" aria-labelledby="tg-tab-0" tabindex="0">
                                                            <div class="feature__image floating-content">
                                                                <img decoding="async" style="object-fit: cover;" src="https://images.unsplash.com/photo-1518546305927-5a555bb7020d?auto=format&fit=crop&w=600&q=80" alt="Stake Income">
                                                                <div class="floating-content__top-right floating-content__top-right--style2" data-aos="fade-left" data-aos-duration="1000">
                                                                    <div class="floating-content__item floating-content__item--style2 text-center">
                                                                        <h3 class="style2" style="color: var(--secondary-color) !important; font-size: 24px;">0.5%</h3>
                                                                        <p class="style2">Daily Yield</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="tg-id-1" role="tabpanel" aria-labelledby="tg-tab-1" tabindex="0">
                                                            <div class="feature__image floating-content">
                                                                <img decoding="async" style="object-fit: cover;" src="https://images.unsplash.com/photo-1579621970795-87facc2f976d?auto=format&fit=crop&w=600&q=80" alt="Referral Income">
                                                                <div class="floating-content__top-right floating-content__top-right--style2" data-aos="fade-left" data-aos-duration="1000">
                                                                    <div class="floating-content__item floating-content__item--style2 text-center">
                                                                        <h3 class="style2" style="color: var(--secondary-color) !important; font-size: 24px;">5%</h3>
                                                                        <p class="style2">Direct Referral</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="tg-id-2" role="tabpanel" aria-labelledby="tg-tab-2" tabindex="0">
                                                            <div class="feature__image floating-content">
                                                                <img decoding="async" style="object-fit: cover;" src="https://images.unsplash.com/photo-1563013544-824ae1d704d3?auto=format&fit=crop&w=600&q=80" alt="Level Income">
                                                                <div class="floating-content__top-right floating-content__top-right--style2" data-aos="fade-left" data-aos-duration="1000">
                                                                    <div class="floating-content__item floating-content__item--style2 text-center">
                                                                        <h3 class="style2" style="color: var(--secondary-color) !important; font-size: 24px;">1%</h3>
                                                                        <p class="style2">Level Reward</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="tg-id-3" role="tabpanel" aria-labelledby="tg-tab-3" tabindex="0">
                                                            <div class="feature__image floating-content">
                                                                <img decoding="async" style="object-fit: cover;" src="https://images.unsplash.com/photo-1621416894569-0f39ed31d247?auto=format&fit=crop&w=600&q=80" alt="Auto Pool Income">
                                                                <div class="floating-content__top-right floating-content__top-right--style2" data-aos="fade-left" data-aos-duration="1000">
                                                                    <div class="floating-content__item floating-content__item--style2 text-center">
                                                                        <h3 class="style2" style="color: var(--secondary-color) !important; font-size: 24px;">Auto</h3>
                                                                        <p class="style2">Pool System</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="tg-id-4" role="tabpanel" aria-labelledby="tg-tab-4" tabindex="0">
                                                            <div class="feature__image floating-content">
                                                                <img decoding="async" style="object-fit: cover;" src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=600&q=80" alt="Team Building Bonus">
                                                                <div class="floating-content__top-right floating-content__top-right--style2" data-aos="fade-left" data-aos-duration="1000">
                                                                    <div class="floating-content__item floating-content__item--style2 text-center">
                                                                        <h3 class="style2" style="color: var(--secondary-color) !important; font-size: 24px;">Bonus</h3>
                                                                        <p class="style2">Team Builder</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="feature__shape">
                                <span class="feature__shape-item feature__shape-item--1">
                                    <img decoding="async" src="/wp-content/uploads/2023/10/features_shape.png" width="70" alt="shape-icon">
                                </span>
                                <span class="feature__shape-item feature__shape-item--2">
                                    <span></span>
                                </span>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if ($page == 'all')
        <div class="homepage-sections-grid-container grid-last-span-2">
            @endif

            <!-- Market Analysis -->
            @if ($page == 'all' || $page == 'ourmission')
            <div class="stticky">
                <div class="stticky-text">Market Analysis</div>
                <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="market-analysis" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                    <div class="e-con-inner sectioncards">
                        <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                                <div class="elementor-widget-container">
                                    <script>
                                        jQuery(document).ready(function($) {

                                            AOS.init();

                                        });

                                    </script>
                                    <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                        <div class="about__thumb-inner">
                                            <div class="about__thumb-image floating-content">
                                                <img decoding="async" style="object-fit: cover; height: 298px;" src="https://images.unsplash.com/photo-1605792657660-596af9009e82?auto=format&fit=crop&w=600&q=80" alt="Market Analysis">
                                                <div class="floating-content__top-left">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>10 Years</h3>
                                                        <p>Consulting Experience</p>
                                                    </div> -->
                                                </div>
                                                <div class="floating-content__bottom-right">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>25K+</h3>
                                                        <p>Satisfied Customers</p>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <h2 class="elementor-heading-title elementor-size-default">
                                        Real-Time
                                        <span style="color: var(--secondary-color);">Market Analysis</span>
                                    </h2>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <p class="elementor-heading-title elementor-size-default">
                                        “Our proprietary algorithms continuously process order book depths, liquidation events, and global macroeconomic trends to execute high-probability trades with absolute precision. By integrating institutional data feeds, real-time sentiment analysis, and order flow tracking, GWI detects market shifts before they manifest in price swings. This continuous monitoring enables us to hedge exposure dynamically, safeguard digital assets, and execute directionally aligned strategies across major trading venues.”
                                    </p>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                                <div class="elementor-widget-container">
                                    <!-- <a
                                        href="/dark/about-us/"
                                        target="_self"
                                        rel="nofollow"
                                        class="trk-btn trk-btn--border trk-btn--primary"
                                    >
                                        More
                                    </a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Staking Plans -->
            @if ($page == 'all' || $page == 'ourmission')
            <div class="stticky">
                <div class="stticky-text">Staking Plans</div>
                <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="invest-plans" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                    <div class="e-con-inner sectioncards">
                        <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <h2 class="elementor-heading-title elementor-size-default">
                                        Diversified
                                        <span style="color: var(--secondary-color);">Staking Plans</span>
                                    </h2>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <p class="elementor-heading-title elementor-size-default">
                                        “Choose from a curated selection of highly structured staking plans tailored to your unique liquidity requirements, maximizing long-term validator yields while minimizing operational risk. GWI offers flexible lock-up periods, tiered reward ratios, and direct access to top-tier validation pools. Our automated reward compounding and validator health tracking ensure your staked assets operate at maximum efficiency, generating stable passive income throughout all market conditions.”
                                    </p>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                                <div class="elementor-widget-container">
                                    <!-- <a
                                        href="/dark/about-us/"
                                        target="_self"
                                        rel="nofollow"
                                        class="trk-btn trk-btn--border trk-btn--primary"
                                    >
                                        More
                                    </a> -->
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                                <div class="elementor-widget-container">
                                    <script>
                                        jQuery(document).ready(function($) {

                                            AOS.init();

                                        });

                                    </script>
                                    <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                        <div class="about__thumb-inner">
                                            <div class="about__thumb-image floating-content">
                                                <img style="height: 298px; object-fit: cover;" decoding="async" src="https://images.unsplash.com/photo-1639762681485-074b7f938ba0?auto=format&fit=crop&w=600&q=80" alt="Staking Plans">
                                                <div class="floating-content__top-left">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>10 Years</h3>
                                                        <p>Consulting Experience</p>
                                                    </div> -->
                                                </div>
                                                <div class="floating-content__bottom-right">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>25K+</h3>
                                                        <p>Satisfied Customers</p>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Growth Testing -->
            @if ($page == 'all' || $page == 'ourmission')
            <div class="stticky">
                <div class="stticky-text">Growth Testing</div>
                <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="growth-testing" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                    <div class="e-con-inner sectioncards">
                        <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                                <div class="elementor-widget-container">
                                    <script>
                                        jQuery(document).ready(function($) {

                                            AOS.init();

                                        });

                                    </script>
                                    <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                        <div class="about__thumb-inner">
                                            <div class="about__thumb-image floating-content">
                                                <img decoding="async" style="height: 298px; object-fit: cover;" src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=600&q=80" alt="Growth Testing">
                                                <div class="floating-content__top-left">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>10 Years</h3>
                                                        <p>Consulting Experience</p>
                                                    </div> -->
                                                </div>
                                                <div class="floating-content__bottom-right">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>25K+</h3>
                                                        <p>Satisfied Customers</p>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <h2 class="elementor-heading-title elementor-size-default">
                                        Predictive
                                        <span style="color: var(--secondary-color);">Growth Modeling</span>
                                    </h2>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <p class="elementor-heading-title elementor-size-default">
                                        “We apply advanced mathematical modeling and exhaustive historical backtesting to optimize staking variables, ensuring robust network stability and sustained yield metrics. Our quantitative researchers continuously run Monte Carlo simulations and stress-test liquid staking protocols under extreme market volatility. This predictive growth validation ensures that our capital allocation strategies remain resilient, protecting validator weights and compounding yields with statistical certainty.”
                                    </p>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                                <div class="elementor-widget-container">
                                    <!-- <a
                                        href="/dark/about-us/"
                                        target="_self"
                                        rel="nofollow"
                                        class="trk-btn trk-btn--border trk-btn--primary"
                                    >
                                        More
                                    </a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Management -->
            @if ($page == 'all' || $page == 'ourmission')
            <div class="stticky">
                <div class="stticky-text">Management</div>
                <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="the-management" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                    <div class="e-con-inner sectioncards">
                        <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <h2 class="elementor-heading-title elementor-size-default">
                                        Asset
                                        <span style="color: var(--secondary-color);">Management</span>
                                    </h2>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <p class="elementor-heading-title elementor-size-default">
                                        “Our comprehensive asset management framework utilizes automated risk parameter adjustments, dynamic hedging strategies, and multi-signature cold-storage treasury systems. We separate operational validator capital from reserve funds, enforcing strict capital-preservation rules across the ecosystem. Through audited smart contract execution and collaborative oversight with leading custodian networks, GWI provides institutional-grade transparency and absolute security for all digital asset allocations.”
                                    </p>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                                <div class="elementor-widget-container">
                                    <!-- <a
                                        href="/dark/about-us/"
                                        target="_self"
                                        rel="nofollow"
                                        class="trk-btn trk-btn--border trk-btn--primary"
                                    >
                                        More
                                    </a> -->
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                                <div class="elementor-widget-container">
                                    <script>
                                        jQuery(document).ready(function($) {

                                            AOS.init();

                                        });

                                    </script>
                                    <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                        <div class="about__thumb-inner">
                                            <div class="about__thumb-image floating-content">
                                                <img decoding="async" style="height: 298px; object-fit: cover;" src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=600&q=80" alt="Management">
                                                <div class="floating-content__top-left">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>10 Years</h3>
                                                        <p>Consulting Experience</p>
                                                    </div> -->
                                                </div>
                                                <div class="floating-content__bottom-right">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>25K+</h3>
                                                        <p>Satisfied Customers</p>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- AI Trading -->
            @if ($page == 'all' || $page == 'ourmission')
            <div class="stticky">
                <div class="stticky-text">AI Trading</div>
                <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="ai-trading" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                    <div class="e-con-inner sectioncards">
                        <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                                <div class="elementor-widget-container">
                                    <script>
                                        jQuery(document).ready(function($) {

                                            AOS.init();

                                        });

                                    </script>
                                    <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                        <div class="about__thumb-inner">
                                            <div class="about__thumb-image floating-content">
                                                <img decoding="async" style="height: 298px; object-fit: cover;" src="https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?auto=format&fit=crop&w=600&q=80" alt="AI Trading">
                                                <div class="floating-content__top-left">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>10 Years</h3>
                                                        <p>Consulting Experience</p>
                                                    </div> -->
                                                </div>
                                                <div class="floating-content__bottom-right">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>25K+</h3>
                                                        <p>Satisfied Customers</p>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <h2 class="elementor-heading-title elementor-size-default">
                                        AI-Powered
                                        <span style="color: var(--secondary-color);">Arbitrage Engine</span>
                                    </h2>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <p class="elementor-heading-title elementor-size-default">
                                        "GWI's proprietary AI engine continuously scans cross-exchange order books, spot-futures spreads, and liquidity pools to execute automated market-making and triangular arbitrage strategies. By running advanced neural networks that analyze price action dynamics in real-time, our system minimizes drawdown risks and capitalizes on micro-second price discrepancies. The system operates 24/7 across multiple blockchain protocols and high-liquidity centralized exchanges, ensuring consistent yield generation regardless of overall market direction."
                                    </p>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                                <div class="elementor-widget-container">
                                    <!-- <a
                                        href="/dark/about-us/"
                                        target="_self"
                                        rel="nofollow"
                                        class="trk-btn trk-btn--border trk-btn--primary"
                                    >
                                        More
                                    </a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if ($page == 'all')
        </div>
        @endif

        <!-- TRADING TYPES -->
        @if ($page == 'ourmission')
        <div class="stticky">
            <div class="stticky-text">TRADING TYPES</div>
            <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="arbitrage-bot" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                <div class="e-con-inner sectioncards sec-top-img">
                    <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" style="width: 85%;" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                        <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                            <div class="elementor-widget-container">
                                <h2 class="elementor-heading-title elementor-size-default">
                                    <span style="color: var(--secondary-color);">TRADING</span>
                                    TYPES
                                </h2>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                            <div class="elementor-widget-container trade-p">
                                <style>
                                    .trade-p span {
                                        color: #fff;
                                        font-size: 18px;
                                        font-weight: 700;
                                    }

                                </style>

                                <p class="elementor-heading-title elementor-size-default trade-p">Modern digital asset markets employ a variety of execution methodologies. Our system deploys diversified quantitative strategies to ensure maximum capital efficiency: <br>Execution Methodologies: <br><br>
                                    <div style="display: flex; flex-direction: row;"><img style="height: 100px; width: 100px; margin-right: 13px; border-radius: 10px; object-fit: cover;" src="https://images.unsplash.com/photo-1621761191319-c6fb62004040?auto=format&fit=crop&w=150&q=80">
                                        <div class="trade-p"><span>ARBITRAGE BOT</span><br>Exploits price inefficiencies for identical assets across multiple decentralized and centralized platforms with minimal risk exposure. </div>
                                    </div><br><br>
                                    <div style="display: flex; flex-direction: row;"><img style="height: 100px; width: 100px; margin-right: 13px; border-radius: 10px; object-fit: cover;" src="https://images.unsplash.com/photo-1590283603385-17ffb3a7f29f?auto=format&fit=crop&w=150&q=80">
                                        <div class="trade-p"><span>Day Trading:</span><br>Algorithmic execution of intraday positions to capitalize on short-term price swings and volatility spikes. </div>
                                    </div><br><br>
                                    <div style="display: flex; flex-direction: row;"><img style="height: 100px; width: 100px; margin-right: 13px; border-radius: 10px; object-fit: cover;" src="https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?auto=format&fit=crop&w=150&q=80">
                                        <div class="trade-p"><span>Swing Trading:</span><br>Captures medium-term market momentum,
                                            holding validator node weights over multi-day trends. </div>
                                    </div><br><br>
                                    <div style="display: flex; flex-direction: row;"><img style="height: 100px; width: 100px; margin-right: 13px; border-radius: 10px; object-fit: cover;" src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=150&q=80">
                                        <div class="trade-p"><span>Trend Following:</span><br>Utilizes advanced moving averages and mathematical indicators to trace macro market trends and execute directionally aligned trades. </div>
                                    </div><br><br>
                                    <div style="display: flex; flex-direction: row;"><img style="height: 100px; width: 100px; margin-right: 13px; border-radius: 10px; object-fit: cover;" src="https://images.unsplash.com/photo-1622630998477-20aa696ecb05?auto=format&fit=crop&w=150&q=80">
                                        <div class="trade-p"><span>Spot Trading:</span><br>Direct acquisition and exchange of underlying layer-1 and layer-2 digital assets at real-time market value. </div>
                                    </div><br><br>
                                    <div style="display: flex; flex-direction: row;"><img style="height: 100px; width: 100px; margin-right: 13px; border-radius: 10px; object-fit: cover;" src="https://images.unsplash.com/photo-1537989370866-91b7e2518222?auto=format&fit=crop&w=150&q=80">
                                        <div class="trade-p"><span>Futures & Options Trading:</span><br>Deploys derivative contracts to hedge staking positions,
                                            leveraging options and futures for delta-neutral yield optimization. </div>
                                    </div><br><br>
                                    <div style="display: flex; flex-direction: row;"><img style="height: 100px; width: 100px; margin-right: 13px; border-radius: 10px; object-fit: cover;" src="https://images.unsplash.com/photo-1559526324-4b87b5e36e44?auto=format&fit=crop&w=150&q=80">
                                        <div class="trade-p"><span>Margin Trading:</span><br>Utilizes institutional leverage to maximize capital performance while employing strict real-time liquidation protections. </div>
                                    </div><br><br>
                                    <div style="display: flex; flex-direction: row;"><img style="height: 100px; width: 100px; margin-right: 13px; border-radius: 10px; object-fit: cover;" src="https://images.unsplash.com/photo-1620712943543-bcc4688e7485?auto=format&fit=crop&w=150&q=80">
                                        <div class="trade-p"><span>Range Trading:</span><br>Executes mean-reversion algorithms between verified support and resistance boundaries in sideways markets. </div>
                                    </div><br><br>
                                    <div style="display: flex; flex-direction: row;"><img style="height: 100px; width: 100px; margin-right: 13px; border-radius: 10px; object-fit: cover;" src="https://images.unsplash.com/photo-1642104704074-907c0698cbd9?auto=format&fit=crop&w=150&q=80">
                                        <div class="trade-p"><span>Arbitrage Trading:</span><br>Secures cross-protocol price differences,
                                            utilizing instant flash-loan mechanisms for capital-efficient execution. </div>
                                    </div><br><br>Each strategy is automatically allocated capital based on machine-learned volatility models,
                                    maximizing risk-adjusted returns (Sharpe Ratio) across the entire staking ecosystem.
                                </p>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                            <div class="elementor-widget-container">
                                <a href="/dark/about-us/" target="_self" rel="nofollow" class="trk-btn trk-btn--border trk-btn--primary">More </a>
                            </div>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                        <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                            <div class="elementor-widget-container">
                                <script>
                                    jQuery(document).ready(function($) {

                                            AOS.init();

                                        }

                                    );

                                </script>
                                <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                    <div class="about__thumb-inner">
                                        <div class="about__thumb-image floating-content"><img decoding="async" style="height: 298px; object-fit: cover;" src="https://images.unsplash.com/photo-1526304640581-d334cdbbf45e?auto=format&fit=crop&w=600&q=80" alt="Trading Types">
                                            <div class="floating-content__top-left">
                                                < !-- <div class="floating-content__item">
                                                    <h3>10 Years</h3>
                                                    <p>Consulting Experience</p>
                                            </div>-->
                                        </div>
                                        <div class="floating-content__bottom-right">
                                            < !-- <div class="floating-content__item">
                                                <h3>25K+</h3>
                                                <p>Satisfied Customers</p>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if ($page=='all'|| $page=='ourmission') <div class="elementor-element elementor-element-5482bb2 bg-color e-flex e-con-boxed e-con e-parent" data-id="5482bb2" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
            <div class="e-con-inner">
                <div class="elementor-element elementor-element-a229896 elementor-widget__width-inherit elementor-absolute h-100 elementor-widget elementor-widget-bg-shapes" data-id="a229896" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="bg-shapes.default">
                    <div class="elementor-widget-container">
                        <div class="roadmap--style1"><span class="roadmap__shape-item roadmap__shape-item--1"><span></span></span></div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-8a1b9ae elementor-widget__width-auto elementor-absolute upAndDown_animation elementor-widget elementor-widget-image" data-id="8a1b9ae" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="image.default">
                    <div class="elementor-widget-container">
                        <style>
                            /*! elementor - v3.16.0 - 09-10-2023 */

                            .elementor-widget-image {
                                text-align: center
                            }

                            .elementor-widget-image a {
                                display: inline-block
                            }

                            .elementor-widget-image a img[src$=".svg"] {
                                width: 48px
                            }

                            .elementor-widget-image img {
                                vertical-align: middle;
                                display: inline-block
                            }

                            @media (min-width: 768px) {
                                .roadmap--style1 .roadmap__wrapper:after {
                                    height: 10% !important;
                                }
                            }

                        </style> <img decoding="async" width="106" height="106" src="https://bitrader.thetork.com/dark/wp-content/uploads/2023/10/shape01.png" class="attachment-full size-full wp-image-238" alt="" />
                    </div>
                </div>
                <div class="elementor-element elementor-element-0caae5d e-flex e-con-boxed e-con e-child" data-id="0caae5d" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}">
                    <div class="e-con-inner sectioncards">
                        <div class="elementor-element elementor-element-6f737e6 elementor-widget elementor-widget-tg-heading" data-id="6f737e6" data-element_type="widget" data-widget_type="tg-heading.default">
                            <div class="elementor-widget-container">

                                <div class="section-title">
                                    <h2 class="title">Our <span>Projects</span></h2>
                                </div>

                            </div>
                        </div>
                        <div class="elementor-element elementor-element-c258034 elementor-widget elementor-widget-heading" data-id="c258034" data-element_type="widget" data-widget_type="heading.default">
                            <div class="elementor-widget-container">
                                <p class="elementor-heading-title elementor-size-default">The roadmap shows
                                    the path ahead, helps teams plan, and guides the delivery of the product.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-3473502 elementor-widget elementor-widget-genix-roadmap" data-id="3473502" data-element_type="widget" data-widget_type="genix-roadmap.default">
                    <div class="elementor-widget-container">

                        <script>
                            jQuery(document).ready(function($) {

                                AOS.init();

                            });

                        </script>


                        <div class="roadmap--style1">
                            <div class="roadmap__wrapper">
                                <div class="row gy-4 gy-md-0 gx-5">
                                    <div class="col-md-6 offset-md-6">
                                        <div class="roadmap__item ms-md-4 aos-init aos-animate" data-aos="fade-left" data-aos-duration="800">
                                            <div class="roadmap__item-inner">
                                                <div class="roadmap__item-content">
                                                    <div class="roadmap__item-header">
                                                        <h3>Website launching</h3>
                                                        <span>Q2</span>
                                                    </div>
                                                    <p>Website launching and first level leaders meet in india.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="roadmap__item roadmap__item--style2 ms-auto me-md-4 aos-init aos-animate" data-aos="fade-right" data-aos-duration="800">
                                            <div class="roadmap__item-inner">
                                                <div class="roadmap__item-content">
                                                    <div class="roadmap__item-header">
                                                        <h3>International launching</h3>
                                                        <span>Q3</span>
                                                    </div>
                                                    <p>Second leaders meet and international launching at dubai.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 offset-md-6">
                                        <div class="roadmap__item ms-md-4 aos-init aos-animate" data-aos="fade-left" data-aos-duration="800">
                                            <div class="roadmap__item-inner">
                                                <div class="roadmap__item-content">
                                                    <div class="roadmap__item-header">
                                                        <h3>Financial ecosystem</h3>
                                                        <span>Q4</span>
                                                    </div>
                                                    <p>Thrive card launching</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        @endif

        @if ($page == 'all')
        <div class="homepage-sections-grid-container grid-last-span-2">
            @endif

            <!-- INVEST RISK FREE -->
            @if ($page == 'all' || $page == 'ourmission')
            <div class="stticky">
                <div class="stticky-text">RISK FREE</div>
                <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="risk-free" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                    <div class="e-con-inner sectioncards">
                        <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                                <div class="elementor-widget-container">
                                    <script>
                                        jQuery(document).ready(function($) {

                                            AOS.init();

                                        });

                                    </script>
                                    <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                        <div class="about__thumb-inner">
                                            <div class="about__thumb-image floating-content">
                                                <img decoding="async" style="height: 298px; object-fit: cover;" src="https://images.unsplash.com/photo-1563986768609-322da13575f3?auto=format&fit=crop&w=600&q=80" alt="Risk Free">
                                                <div class="floating-content__top-left">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>10 Years</h3>
                                                        <p>Consulting Experience</p>
                                                    </div> -->
                                                </div>
                                                <div class="floating-content__bottom-right">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>25K+</h3>
                                                        <p>Satisfied Customers</p>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <h2 class="elementor-heading-title elementor-size-default">
                                        Mitigated
                                        <span style="color: var(--secondary-color);">Risk Execution</span>
                                    </h2>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <p class="elementor-heading-title elementor-size-default">
                                        "Through delta-neutral positioning, multi-signature custody systems, and automated hedging protocols, GWI minimizes operational exposure. Our advanced algorithms exploit micro-second price disparities under strict risk-mitigation parameters to secure steady yields. By maintaining collateralized liquidity vaults and real-time drawdown protections, we ensure that capital remains shielded from volatility spikes, delivering a secure and highly reliable investment environment for our global partners."
                                    </p>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                                <div class="elementor-widget-container">
                                    <!-- <a
                                        href="/dark/about-us/"
                                        target="_self"
                                        rel="nofollow"
                                        class="trk-btn trk-btn--border trk-btn--primary"
                                    >
                                        More
                                    </a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- LOW LATENCY EXECUTION -->
            @if ($page == 'all' || $page == 'ourmission')
            <div class="stticky">
                <div class="stticky-text">LATENCY EXECUTION</div>
                <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="low-latency" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                    <div class="e-con-inner sectioncards">
                        <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <h2 class="elementor-heading-title elementor-size-default">
                                        LOW-LATENCY
                                        <span style="color: var(--secondary-color);">PROTOCOL EXECUTION</span>
                                    </h2>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <p class="elementor-heading-title elementor-size-default">
                                        "Our high-frequency validation nodes are co-located near major digital asset exchange matching servers and blockchain RPC endpoints. Running custom Rust-based arbitrage engines on a high-throughput network ensures we capture price discrepancies ahead of retail market participants, maintaining GWI's competitive edge. By minimizing routing hops and optimizing network packages, we execute transactions at microsecond speeds to capture fleeting arbitrage windows across multiple decentralized protocols."
                                    </p>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                                <div class="elementor-widget-container">
                                    <!-- <a
                                        href="/dark/about-us/"
                                        target="_self"
                                        rel="nofollow"
                                        class="trk-btn trk-btn--border trk-btn--primary"
                                    >
                                        More
                                    </a> -->
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                                <div class="elementor-widget-container">
                                    <script>
                                        jQuery(document).ready(function($) {

                                            AOS.init();

                                        });

                                    </script>
                                    <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                        <div class="about__thumb-inner">
                                            <div class="about__thumb-image floating-content">
                                                <img decoding="async" style="height: 298px; object-fit: cover;" src="https://images.unsplash.com/photo-1544197150-b99a580bb7a8?auto=format&fit=crop&w=600&q=80" alt="Low Latency">
                                                <div class="floating-content__top-left">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>10 Years</h3>
                                                        <p>Consulting Experience</p>
                                                    </div> -->
                                                </div>
                                                <div class="floating-content__bottom-right">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>25K+</h3>
                                                        <p>Satisfied Customers</p>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- DEDICATED QUANT TEAM -->
            @if ($page == 'all' || $page == 'ourmission')
            <div class="stticky">
                <div class="stticky-text">QUANT TEAM</div>
                <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="quant-team" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                    <div class="e-con-inner sectioncards">
                        <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                                <div class="elementor-widget-container">
                                    <script>
                                        jQuery(document).ready(function($) {

                                            AOS.init();

                                        });

                                    </script>
                                    <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                        <div class="about__thumb-inner">
                                            <div class="about__thumb-image floating-content">
                                                <img decoding="async" style="height: 298px; object-fit: cover;" src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=600&q=80" alt="Quant Team">
                                                <div class="floating-content__top-left">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>10 Years</h3>
                                                        <p>Consulting Experience</p>
                                                    </div> -->
                                                </div>
                                                <div class="floating-content__bottom-right">
                                                    <!-- <div class="floating-content__item">
                                                        <h3>25K+</h3>
                                                        <p>Satisfied Customers</p>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <h2 class="elementor-heading-title elementor-size-default">
                                        INSTITUTIONAL
                                        <span style="color: var(--secondary-color);">QUANT & BLOCKCHAIN TEAM</span>
                                    </h2>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <p class="elementor-heading-title elementor-size-default">
                                        "Our dedicated research team comprises veteran quantitative developers, cryptography researchers, and smart contract engineers. With decades of combined experience designing algorithmic trading systems for traditional hedge funds and validating decentralized Web3 protocols, they continuously refine our algorithmic models and validator infrastructure. This deep technical expertise allows us to identify institutional opportunities, audit security vulnerabilities, and build robust software pipelines that keep GWI at the industry forefront."
                                    </p>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                                <div class="elementor-widget-container">
                                    <!-- <a
                                        href="/dark/about-us/"
                                        target="_self"
                                        rel="nofollow"
                                        class="trk-btn trk-btn--border trk-btn--primary"
                                    >
                                        More
                                    </a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if ($page == 'all')
        </div>
        @endif

        <!-- GWI EVENTS 2024 -->
        @if ($page == 'all' || $page == 'ourmission')
        <div class="stticky">
            <div class="stticky-text">GWI EVENTS</div>
            <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="low-latency" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                <div class="e-con-inner">
                </div>
            </div>
        </div>
        @endif

        <!-- GWI EVENT images -->
        @if ($page == 'all' || $page == 'ourmission')
        <style>
            .about__thumb-image::after {
                position: absolute;
                content: none !important;
                display: none !important;
            }

            .evnt_imgs .about__thumb-image.floating-content {
                display: flex;
                justify-content: center;
            }

            .elementor-67 .elementor-element.elementor-element-3d03e0f {
                --width: 100% !important;
            }

            .evnt_imgs {
                width: 100%;
                display: grid;
                grid-template-columns: 1fr;
                grid-gap: 30px;
            }

            @media (min-width: 768px) {
                .evnt_imgs {
                    grid-template-columns: repeat(2, 1fr);
                    grid-gap: 50px;
                }
            }

        </style>
        <div class="stticky">
            <div class="stticky-text">GWI EVENTS</div>
            <div class="elementor-element elementor-element-47b6712 e-flex e-con-boxed e-con e-parent" data-id="47b6712" id="low-latency" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                <div class="e-con-inner sectioncards" style="display: flex; flex-direction: column; justify-content: center; align-items: start;">
                    <div>
                        <div class="elementor-element elementor-element-f496e11 e-con-full e-flex e-con e-child" data-id="f496e11" style="
                    width: 100%;
                " data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-2a404d7 elementor-widget elementor-widget-heading" data-id="2a404d7" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <h2 class="elementor-heading-title elementor-size-default">
                                        GWI EVENTS
                                        <span style="color: var(--secondary-color);">2026</span>

                                    </h2>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-77c0134 elementor-widget elementor-widget-heading" data-id="77c0134" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <p class="elementor-heading-title elementor-size-default">
                                        Highlighting our active participation in global Web3 conferences, validator node workshops, and exclusive elite partner summits.
                                    </p>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-211649c elementor-widget elementor-widget-tg-btn" data-id="211649c" data-element_type="widget" data-widget_type="tg-btn.default">
                                <div class="elementor-widget-container">
                                    <!-- <a
                                href="/dark/about-us/"
                                target="_self"
                                rel="nofollow"
                                class="trk-btn trk-btn--border trk-btn--primary"
                            >
                                More
                            </a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="evnt_imgs">
                        <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                                <div class="elementor-widget-container">
                                    <script>
                                        jQuery(document).ready(function($) {

                                            AOS.init();

                                        });

                                    </script>
                                    <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                        <div class="about__thumb-inner">
                                            <div class="about__thumb-image floating-content">
                                                <img decoding="async" style="height: 180px; object-fit: cover;" src="https://images.unsplash.com/photo-1511578314322-379afb476865?auto=format&fit=crop&w=600&q=80" alt="Event 1">
                                                <div class="floating-content__top-left">
                                                    <!-- <div class="floating-content__item">
                                                <h3>10 Years</h3>
                                                <p>Consulting Experience</p>
                                            </div> -->
                                                </div>
                                                <div class="floating-content__bottom-right">
                                                    <!-- <div class="floating-content__item">
                                                <h3>25K+</h3>
                                                <p>Satisfied Customers</p>
                                            </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                                <div class="elementor-widget-container">
                                    <script>
                                        jQuery(document).ready(function($) {

                                            AOS.init();

                                        });

                                    </script>
                                    <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                        <div class="about__thumb-inner">
                                            <div class="about__thumb-image floating-content">
                                                <img decoding="async" style="height: 180px; object-fit: cover;" src="https://images.unsplash.com/photo-1506012787146-f92b2d7d6d96?auto=format&fit=crop&w=600&q=80" alt="Event 2">
                                                <div class="floating-content__top-left">
                                                    <!-- <div class="floating-content__item">
                                                <h3>10 Years</h3>
                                                <p>Consulting Experience</p>
                                            </div> -->
                                                </div>
                                                <div class="floating-content__bottom-right">
                                                    <!-- <div class="floating-content__item">
                                                <h3>25K+</h3>
                                                <p>Satisfied Customers</p>
                                            </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                                <div class="elementor-widget-container">
                                    <script>
                                        jQuery(document).ready(function($) {

                                            AOS.init();

                                        });

                                    </script>
                                    <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                        <div class="about__thumb-inner">
                                            <div class="about__thumb-image floating-content">
                                                <img decoding="async" style="height: 180px; object-fit: cover;" src="https://images.unsplash.com/photo-1582672060674-bc2bd808a8b5?auto=format&fit=crop&w=600&q=80" alt="Event 3">
                                                <div class="floating-content__top-left">
                                                    <!-- <div class="floating-content__item">
                                                <h3>10 Years</h3>
                                                <p>Consulting Experience</p>
                                            </div> -->
                                                </div>
                                                <div class="floating-content__bottom-right">
                                                    <!-- <div class="floating-content__item">
                                                <h3>25K+</h3>
                                                <p>Satisfied Customers</p>
                                            </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-3d03e0f e-con-full e-flex e-con e-child" data-id="3d03e0f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-8a79fe6 elementor-widget elementor-widget-genix-image" data-id="8a79fe6" data-element_type="widget" data-widget_type="genix-image.default">
                                <div class="elementor-widget-container">
                                    <script>
                                        jQuery(document).ready(function($) {

                                            AOS.init();

                                        });

                                    </script>
                                    <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
                                        <div class="about__thumb-inner">
                                            <div class="about__thumb-image floating-content">
                                                <img decoding="async" style="height: 180px; object-fit: cover;" src="https://images.unsplash.com/photo-1469371670807-013ccf25f16a?auto=format&fit=crop&w=600&q=80" alt="Event 4">
                                                <div class="floating-content__top-left">
                                                    <!-- <div class="floating-content__item">
                                                <h3>10 Years</h3>
                                                <p>Consulting Experience</p>
                                            </div> -->
                                                </div>
                                                <div class="floating-content__bottom-right">
                                                    <!-- <div class="floating-content__item">
                                                <h3>25K+</h3>
                                                <p>Satisfied Customers</p>
                                            </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Sbscrib -->
        @if ($page == 'all')
        <div class="elementor-element elementor-element-cca183d bg-color e-flex e-con-boxed e-con e-parent" data-id="cca183d" id="contact_us" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
            <div class="e-con-inner">
                <div class="elementor-element elementor-element-a3cd40c e-flex e-con-boxed e-con e-child" data-id="a3cd40c" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;content_width&quot;:&quot;boxed&quot;}">
                    <div class="e-con-inner">
                        <div class="elementor-element elementor-element-e8c8591 e-con-full e-flex e-con e-child contact-main-card" data-id="e8c8591" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                            <div class="elementor-element elementor-element-403e394 e-con-full e-flex e-con e-child" data-id="403e394" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                                <div class="elementor-element elementor-element-17f2b1b cta__thumb elementor-widget elementor-widget-image" data-id="17f2b1b" data-element_type="widget" data-widget_type="image.default">
                                    <div class="elementor-widget-container">
                                        <img loading="lazy" decoding="async" width="244" height="235" style="object-fit: cover; border-radius: 12px;" src="https://images.unsplash.com/photo-1534536281715-e28d76689b4d?auto=format&fit=crop&w=600&q=80" class="attachment-full size-full wp-image-312" alt="Contact Us">
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-02dff66 e-flex e-con-boxed e-con e-child" data-id="02dff66" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}">
                                <div class="e-con-inner contact-form-panel">
                                    <div class="elementor-element elementor-element-34cb115 elementor-widget elementor-widget-tg-heading" data-id="34cb115" data-element_type="widget" data-widget_type="tg-heading.default">
                                        <div class="elementor-widget-container">
                                            <div class="section-title">
                                                <h2 class="title">
                                                    <span style="color: var(--secondary-color)">Contact</span>
                                                    Us
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-dad813c elementor-widget elementor-widget-heading" data-id="dad813c" data-element_type="widget" data-widget_type="heading.default">
                                        <div class="elementor-widget-container">
                                            <p class="elementor-heading-title elementor-size-default">Hey! Are
                                                you tired of missing out on our updates? Contact us , we will
                                                contact you in 24hr</p>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-50c820d text-center elementor-widget elementor-widget-shortcode" data-id="50c820d" data-element_type="widget" data-widget_type="shortcode.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-shortcode">
                                                <script>
                                                    (function() {
                                                        window.mc4wp = window.mc4wp || {
                                                            listeners: []
                                                            , forms: {
                                                                on: function(evt, cb) {
                                                                    window.mc4wp.listeners.push({
                                                                        event: evt
                                                                        , callback: cb
                                                                    });
                                                                }
                                                            }
                                                        }
                                                    })();

                                                </script>
                                                <!-- Mailchimp for WordPress v4.9.9 - https://wordpress.org/plugins/mailchimp-for-wp/ -->
                                                <form id="mc4wp-form-1" class="mc4wp-form mc4wp-form-329" method="post" data-id="329" data-name="Newsletter Form">
                                                    <div class="mc4wp-form-fields">
                                                        <div class="cta-form cta-form--style2 form-subscribe">
                                                            <div class="cta-form__inner d-sm-flex align-items-center">
                                                                <input type="email" class="form-control form-control--style2 mb-3 mb-sm-0 contact-form-input" name="EMAIL" placeholder="Email Address" required>
                                                                <button class="contact-submit-btn" type="submit">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <label style="display: none !important;">
                                                        Leave this field empty if you're human:
                                                        <input type="text" name="_mc4wp_honeypot" value="" tabindex="-1" autocomplete="off">
                                                    </label>
                                                    <input type="hidden" name="_mc4wp_timestamp" value="1714408147">
                                                    <input type="hidden" name="_mc4wp_form_id" value="329">
                                                    <input type="hidden" name="_mc4wp_form_element_id" value="mc4wp-form-1">
                                                    <div class="mc4wp-response"></div>
                                                </form>
                                                <!-- / Mailchimp for WordPress Plugin -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div
                                    class="elementor-element elementor-element-3db5055 elementor-widget__width-auto elementor-absolute bit_rotate_animation elementor-widget elementor-widget-image"
                                    data-id="3db5055"
                                    data-element_type="widget"
                                    data-settings="{&quot;_position&quot;:&quot;absolute&quot;}"
                                    data-widget_type="image.default"
                                >
                                    <div class="elementor-widget-container">
                                        <img
                                            loading="lazy"
                                            decoding="async"
                                            width="65"
                                            height="65"
                                            src="/dark/wp-content/uploads/2023/10/cta_shape1.png"
                                            class="attachment-full size-full wp-image-341"
                                            alt=""
                                        >
                                    </div>
                                </div> -->
                        <div class="elementor-element elementor-element-617ebb8 elementor-widget__width-auto elementor-absolute upAndDown_animation elementor-widget elementor-widget-image" data-id="617ebb8" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="image.default">
                            <div class="elementor-widget-container">
                                <img decoding="async" width="106" height="106" src="/dark/wp-content/uploads/2023/10/shape01.png" class="attachment-full size-full wp-image-238" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Support -->
        @if ($page == 'support')
        <div class="elementor-element elementor-element-cca183d bg-color e-flex e-con-boxed e-con e-parent" data-id="cca183d" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
            <div class="e-con-inner">
                <div class="elementor-element elementor-element-a3cd40c e-flex e-con-boxed e-con e-child" data-id="a3cd40c" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;content_width&quot;:&quot;boxed&quot;}">
                    <div class="e-con-inner">
                        <div class="elementor-element elementor-element-e8c8591 e-con-full e-flex e-con e-child contact-main-card" data-id="e8c8591" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                            <div class="elementor-element elementor-element-403e394 e-con-full e-flex e-con e-child" data-id="403e394" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                                <div class="elementor-element elementor-element-17f2b1b cta__thumb elementor-widget elementor-widget-image" data-id="17f2b1b" data-element_type="widget" data-widget_type="image.default">
                                    <div class="elementor-widget-container">
                                        <img loading="lazy" decoding="async" width="244" height="235" style="object-fit: cover; border-radius: 12px;" src="https://images.unsplash.com/photo-1521791136368-1a8ac2755a85?auto=format&fit=crop&w=600&q=80" class="attachment-full size-full wp-image-312" alt="Support">
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-02dff66 e-flex e-con-boxed e-con e-child" data-id="02dff66" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}">
                                <div class="e-con-inner contact-form-panel">
                                    <div class="elementor-element elementor-element-34cb115 elementor-widget elementor-widget-tg-heading" data-id="34cb115" data-element_type="widget" data-widget_type="tg-heading.default">
                                        <div class="elementor-widget-container">
                                            <div class="section-title">
                                                <h2 class="title">
                                                    <span style="color: var(--secondary-color)"></span>
                                                    Support
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div
                                                class="elementor-element elementor-element-dad813c elementor-widget elementor-widget-heading"
                                                data-id="dad813c"
                                                data-element_type="widget"
                                                data-widget_type="heading.default"
                                            >
                                                <div class="elementor-widget-container">
                                                    <p class="elementor-heading-title elementor-size-default">Hey! Are you tired of missing out on our updates? Subscribe to our news now and stay in the loop!</p>
                                                </div>
                                            </div> -->
                                    <div class="elementor-element elementor-element-50c820d text-center elementor-widget elementor-widget-shortcode" data-id="50c820d" data-element_type="widget" data-widget_type="shortcode.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-shortcode">
                                                <script>
                                                    (function() {
                                                        window.mc4wp = window.mc4wp || {
                                                            listeners: []
                                                            , forms: {
                                                                on: function(evt, cb) {
                                                                    window.mc4wp.listeners.push({
                                                                        event: evt
                                                                        , callback: cb
                                                                    });
                                                                }
                                                            }
                                                        }
                                                    })();

                                                </script>
                                                <!-- Mailchimp for WordPress v4.9.9 - https://wordpress.org/plugins/mailchimp-for-wp/ -->
                                                <form id="mc4wp-form-1" class="mc4wp-form mc4wp-form-329" method="post" action="/main/support">
                                                    <div class="mc4wp-form-fields">
                                                        <div class="cta-form cta-form--style2 form-subscribe">
                                                            <div class="cta-form__inner d-sm-flex align-items-center">
                                                                <input type="text" class="form-control form-control--style2 mb-3 mb-sm-0 contact-form-input" name="subject" style="margin-bottom: 20px !important;" placeholder="Subject" required>
                                                            </div>
                                                            <div class="cta-form__inner d-sm-flex align-items-center">
                                                                <textarea class="form-control form-control--style2 mb-3 mb-sm-0 contact-form-input" name="comment" style="height: 100px; margin-bottom: 20px !important;" placeholder="Comments" required></textarea>
                                                            </div>
                                                            <div class="cta-form__inner d-sm-flex align-items-center">
                                                                <button class="contact-submit-btn" type="submit">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mc4wp-response"></div>
                                                </form>
                                                <!-- / Mailchimp for WordPress Plugin -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div
                                    class="elementor-element elementor-element-3db5055 elementor-widget__width-auto elementor-absolute bit_rotate_animation elementor-widget elementor-widget-image"
                                    data-id="3db5055"
                                    data-element_type="widget"
                                    data-settings="{&quot;_position&quot;:&quot;absolute&quot;}"
                                    data-widget_type="image.default"
                                >
                                    <div class="elementor-widget-container">
                                        <img
                                            loading="lazy"
                                            decoding="async"
                                            width="65"
                                            height="65"
                                            src="/dark/wp-content/uploads/2023/10/cta_shape1.png"
                                            class="attachment-full size-full wp-image-341"
                                            alt=""
                                        >
                                    </div>
                                </div> -->
                        <div class="elementor-element elementor-element-617ebb8 elementor-widget__width-auto elementor-absolute upAndDown_animation elementor-widget elementor-widget-image" data-id="617ebb8" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="image.default">
                            <div class="elementor-widget-container">
                                <img decoding="async" width="106" height="106" src="/dark/wp-content/uploads/2023/10/shape01.png" class="attachment-full size-full wp-image-238" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif



        </div>

        <footer itemtype="https://schema.org/WPFooter" itemscope="itemscope" id="colophon" role="contentinfo">
            <div class="footer-width-fixer">
                <div data-elementor-type="wp-post" data-elementor-id="367" class="elementor elementor-367">
                    <div class="elementor-element elementor-element-e7278ee e-flex e-con-boxed e-con e-parent" data-id="e7278ee" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                        <div class="e-con-inner">
                            <div class="elementor-element elementor-element-ca3a5d8 elementor-widget__width-inherit elementor-absolute h-100 elementor-widget elementor-widget-bg-shapes" data-id="ca3a5d8" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="bg-shapes.default">
                                <div class="elementor-widget-container">
                                    <div class="footer__shape">
                                        <span class="footer__shape-item footer__shape-item--2">
                                            <span></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-bd984a0 e-con-full e-flex e-con e-child" data-id="bd984a0" style="display: flex;
                                    flex-direction: column;
                                    align-items: center;" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                                <div class="elementor-element elementor-element-455b42f e-con-full e-flex e-con e-child" data-id="455b42f" style="display: flex;
                                        justify-content: center;
                                        align-items: center;" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                                    <div class="elementor-element elementor-element-1e70553 elementor-widget__width-initial elementor-widget elementor-widget-site-logo" data-id="1e70553" data-element_type="widget" data-settings="{&quot;align&quot;:&quot;left&quot;,&quot;width&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;width_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;width_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;space&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;space_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;space_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;image_border_radius&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;top&quot;:&quot;&quot;,&quot;right&quot;:&quot;&quot;,&quot;bottom&quot;:&quot;&quot;,&quot;left&quot;:&quot;&quot;,&quot;isLinked&quot;:true},&quot;image_border_radius_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;top&quot;:&quot;&quot;,&quot;right&quot;:&quot;&quot;,&quot;bottom&quot;:&quot;&quot;,&quot;left&quot;:&quot;&quot;,&quot;isLinked&quot;:true},&quot;image_border_radius_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;top&quot;:&quot;&quot;,&quot;right&quot;:&quot;&quot;,&quot;bottom&quot;:&quot;&quot;,&quot;left&quot;:&quot;&quot;,&quot;isLinked&quot;:true},&quot;caption_padding&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;top&quot;:&quot;&quot;,&quot;right&quot;:&quot;&quot;,&quot;bottom&quot;:&quot;&quot;,&quot;left&quot;:&quot;&quot;,&quot;isLinked&quot;:true},&quot;caption_padding_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;top&quot;:&quot;&quot;,&quot;right&quot;:&quot;&quot;,&quot;bottom&quot;:&quot;&quot;,&quot;left&quot;:&quot;&quot;,&quot;isLinked&quot;:true},&quot;caption_padding_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;top&quot;:&quot;&quot;,&quot;right&quot;:&quot;&quot;,&quot;bottom&quot;:&quot;&quot;,&quot;left&quot;:&quot;&quot;,&quot;isLinked&quot;:true},&quot;caption_space&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;caption_space_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;caption_space_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]}}" data-widget_type="site-logo.default">
                                        <div class="elementor-widget-container">
                                            <div class="hfe-site-logo">
                                                <a data-elementor-open-lightbox="" class="elementor-clickable" href="/dark">
                                                    <div class="hfe-site-logo-set">
                                                        <div class="hfe-site-logo-container">
                                                            <img class="hfe-site-logo-img elementor-animation-" src="/tst/grnyellow.png" alt="logo-dark">
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-367b8d7 elementor-widget elementor-widget-heading" data-id="367b8d7" data-element_type="widget" data-widget_type="heading.default">
                                    </div>
                                    <div class="elementor-element elementor-element-319c32e elementor-widget elementor-widget-html" data-id="319c32e" data-element_type="widget" data-widget_type="html.default">
                                        <div class="elementor-widget-container">
                                            <div class="footer__app">
                                                <div class="footer__app-item footer__app-item--apple">
                                                    <div class="footer__app-inner">
                                                        <div class="footer__app-thumb">
                                                            <a href="https://www.apple.com/app-store/" target="_blank" class="stretched-link">
                                                                <img src="/wp-content/uploads/2023/10/apple.png" alt="apple-icon">
                                                            </a>
                                                        </div>
                                                        <div class="footer__app-content">
                                                            <span>Download on the</span>
                                                            <p class="mb-0">App Store</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="footer__app-item footer__app-item--playstore">
                                                    <div class="footer__app-inner">
                                                        <div class="footer__app-thumb">
                                                            <a href="https://play.google.com/store" target="_blank" class="stretched-link">
                                                                <img src="/wp-content/uploads/2023/10/play.png" alt="playstore-icon">
                                                            </a>
                                                        </div>
                                                        <div class="footer__app-content">
                                                            <span>GET IT ON</span>
                                                            <p class="mb-0">Google Play</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="elementor-widget-container">
                                    <p style="text-align: center; font-size: 12px;;" class="elementor-heading-title elementor-size-default">All forms of stakings
                                        carry its risks. Please ensure you fully understand the risks and consider your
                                        financial situation and trading experience before trading.
                                        Wherever necessary, seek independent advice. It is important that you read and
                                        consider the relevant legal documents associated with your account before you
                                        start trading.
                                        <br>
                                        <br>
                                        gwiadmin@gmail.com
                                    </p>
                                </div>
                                <div style="display: none;">
                                    <div class="elementor-element elementor-element-7c023eb e-con-full ms-auto e-flex e-con e-child" data-id="7c023eb" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                                        <div class="elementor-element elementor-element-ec42b89 elementor-widget elementor-widget-heading" data-id="ec42b89" data-element_type="widget" data-widget_type="heading.default">
                                            <div class="elementor-widget-container">
                                                <h5 class="elementor-heading-title elementor-size-default">Quick links
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="elementor-element elementor-element-55bef3a elementor-list-item-link-inline elementor-icon-list--layout-traditional elementor-widget elementor-widget-icon-list" data-id="55bef3a" data-element_type="widget" data-widget_type="icon-list.default">
                                            <div class="elementor-widget-container">
                                                <link rel="stylesheet" href="/dark/wp-content/plugins/elementor/assets/css/widget-icon-list.min.css">
                                                <ul class="elementor-icon-list-items">
                                                    <li class="elementor-icon-list-item">
                                                        <a href="https://bitrader.thetork.com/about-us/">
                                                            <span class="elementor-icon-list-text">About Us</span>
                                                        </a>
                                                    </li>
                                                    <li class="elementor-icon-list-item">
                                                        <a href="#">
                                                            <span class="elementor-icon-list-text">Teams</span>
                                                        </a>
                                                    </li>
                                                    <li class="elementor-icon-list-item">
                                                        <a href="https://bitrader.thetork.com/our-services/">
                                                            <span class="elementor-icon-list-text">Services</span>
                                                        </a>
                                                    </li>
                                                    <li class="elementor-icon-list-item">
                                                        <a href="#">
                                                            <span class="elementor-icon-list-text">Features</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-fadd85c e-con-full e-flex e-con e-child" data-id="fadd85c" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                                        <div class="elementor-element elementor-element-66a2b33 elementor-widget elementor-widget-heading" data-id="66a2b33" data-element_type="widget" data-widget_type="heading.default">
                                            <div class="elementor-widget-container">
                                                <h5 class="elementor-heading-title elementor-size-default">Support
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="elementor-element elementor-element-5a4d818 elementor-list-item-link-inline elementor-icon-list--layout-traditional elementor-widget elementor-widget-icon-list" data-id="5a4d818" data-element_type="widget" data-widget_type="icon-list.default">
                                            <div class="elementor-widget-container">
                                                <ul class="elementor-icon-list-items">
                                                    <li class="elementor-icon-list-item">
                                                        <a href="#">
                                                            <span class="elementor-icon-list-text">Terms &
                                                                Conditions</span>
                                                        </a>
                                                    </li>
                                                    <li class="elementor-icon-list-item">
                                                        <a href="#">
                                                            <span class="elementor-icon-list-text">Privacy
                                                                Policy</span>
                                                        </a>
                                                    </li>
                                                    <li class="elementor-icon-list-item">
                                                        <a href="#">
                                                            <span class="elementor-icon-list-text">FAQs</span>
                                                        </a>
                                                    </li>
                                                    <li class="elementor-icon-list-item">
                                                        <a href="#">
                                                            <span class="elementor-icon-list-text">Support
                                                                Center</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-7d2bbdd e-con-full e-flex e-con e-child" data-id="7d2bbdd" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                                        <div class="elementor-element elementor-element-06c894c elementor-widget elementor-widget-heading" data-id="06c894c" data-element_type="widget" data-widget_type="heading.default">
                                            <div class="elementor-widget-container">
                                                <h5 class="elementor-heading-title elementor-size-default">Company
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="elementor-element elementor-element-ce52651 elementor-list-item-link-inline elementor-icon-list--layout-traditional elementor-widget elementor-widget-icon-list" data-id="ce52651" data-element_type="widget" data-widget_type="icon-list.default">
                                            <div class="elementor-widget-container">
                                                <ul class="elementor-icon-list-items">
                                                    <li class="elementor-icon-list-item">
                                                        <a href="#">
                                                            <span class="elementor-icon-list-text">Careers</span>
                                                        </a>
                                                    </li>
                                                    <li class="elementor-icon-list-item">
                                                        <a href="#">
                                                            <span class="elementor-icon-list-text">Updates</span>
                                                        </a>
                                                    </li>
                                                    <li class="elementor-icon-list-item">
                                                        <a href="#">
                                                            <span class="elementor-icon-list-text">Job</span>
                                                        </a>
                                                    </li>
                                                    <li class="elementor-icon-list-item">
                                                        <a href="#">
                                                            <span class="elementor-icon-list-text">Announce</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-39c3f15 e-con-full e-flex e-con e-child" data-id="39c3f15" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                                <div class="elementor-element elementor-element-c35f4f8 elementor-widget elementor-widget-heading" data-id="c35f4f8" data-element_type="widget" data-widget_type="heading.default">
                                    <div class="elementor-widget-container">
                                        <p class="elementor-heading-title elementor-size-default">© 2026 All Rights
                                            Reserved</p>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-9b0d4fd elementor-widget elementor-widget-sociallist" data-id="9b0d4fd" data-element_type="widget" data-widget_type="sociallist.default">
                                    <div class="elementor-widget-container">
                                        <ul class="social list-wrap">
                                            <li class="social__item">
                                                <a href="#" class="social__link social__link--style22">
                                                    <i aria-hidden="true" class="fab fa-facebook-f"></i>
                                                </a>
                                            </li>
                                            <li class="social__item">
                                                <a href="#" class="social__link social__link--style22">
                                                    <i aria-hidden="true" class="fab fa-instagram"></i>
                                                </a>
                                            </li>
                                            <li class="social__item">
                                                <a href="#" class="social__link social__link--style22">
                                                    <i aria-hidden="true" class="fab fa-linkedin-in"></i>
                                                </a>
                                            </li>
                                            <li class="social__item">
                                                <a href="#" class="social__link social__link--style22">
                                                    <i aria-hidden="true" class="fab fa-youtube"></i>
                                                </a>
                                            </li>
                                            <li class="social__item">
                                                <a href="#" class="social__link social__link--style22">
                                                    <i aria-hidden="true" class="fab fa-twitter"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-1ceb9e5 elementor-widget__width-auto elementor-absolute footer__shape-item--1 elementor-widget elementor-widget-image" data-id="1ceb9e5" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="image.default">
                                <!-- <div class="elementor-widget-container">
                                        <img
                                            width="81"
                                            height="40"
                                            src="/dark/wp-content/uploads/2023/10/footer_shape.png"
                                            class="attachment-full size-full wp-image-419"
                                            alt=""
                                            loading="lazy"
                                        >
                                    </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        </div>

        <!-- #page -->

        <!-- scoll stickke -->
        @if ($page == 'falsex')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var elmnts = document.querySelectorAll('.stticky');
                elmnts.forEach(function(el) {
                    window.addEventListener('scroll', function() {
                        var rect = el.getBoundingClientRect();
                        // alert(rect.top);
                        var distanceFromTop = rect.top + window.scrollY;
                        var distanceFromBottom = rect.bottom + window.scrollY;
                        var scrollY = window.scrollY || window.pageYOffset;
                        var nel = el.querySelector('.stticky-text');
                        if (scrollY >= (distanceFromTop - 200)) {
                            nel.classList.add('stticky-fixed');
                        } else {
                            nel.classList.remove('stticky-fixed');
                        }
                        if (scrollY >= distanceFromBottom) {
                            nel.classList.remove('stticky-fixed');
                        }
                    });
                });
            });

        </script>
        @endif


        <script>
            (function() {
                function maybePrefixUrlField() {
                    const value = this.value.trim()
                    if (value !== '' && value.indexOf('http') !== 0) {
                        this.value = 'http://' + value
                    }
                }

                const urlFields = document.querySelectorAll('.mc4wp-form input[type="url"]')
                for (let j = 0; j < urlFields.length; j++) {
                    urlFields[j].addEventListener('blur', maybePrefixUrlField)
                }
            })();

        </script>
        <script type="text/javascript" src="/dark/wp-content/plugins/contact-form-7/includes/swv/js/index.js?ver=5.8.1" id="swv-js"></script>
        <script type="text/javascript" id="contact-form-7-js-extra">
            /* <![CDATA[ */
            var wpcf7 = {
                "api": {
                    "root": "https:\/\/bitrader.thetork.com\/dark\/wp-json\/"
                    , "namespace": "contact-form-7\/v1"
                }
            };
            /* ]]> */

        </script>
        <script type="text/javascript" src="/dark/wp-content/plugins/contact-form-7/includes/js/index.js?ver=5.8.1" id="contact-form-7-js"></script>
        <script type="text/javascript" src="/dark/wp-content/themes/bitrader/assets/js/bootstrap.min.js?ver=6.5.2" id="bootstrap-bundle-js"></script>
        <script type="text/javascript" src="/dark/wp-content/themes/bitrader/assets/js/swiper-bundle.min.js?ver=6.5.2" id="swiper-js"></script>
        <script type="text/javascript" src="/dark/wp-content/themes/bitrader/assets/js/aos.js?ver=6.5.2" id="aos-js"></script>
        <script type="text/javascript" src="/dark/wp-content/themes/bitrader/assets/js/fslightbox.js?ver=6.5.2" id="fslightbox-js"></script>
        <script type="text/javascript" src="/dark/wp-content/themes/bitrader/assets/js/purecounter_vanilla.js?ver=6.5.2" id="purecounter-js"></script>
        <script type="text/javascript" src="/dark/wp-includes/js/imagesloaded.min.js?ver=5.0.0" id="imagesloaded-js"></script>
        <script type="text/javascript" src="/dark/wp-content/themes/bitrader/assets/js/isotope.pkgd.min.js?ver=6.5.2" id="isotope-js"></script>
        <script type="text/javascript" src="/dark/wp-content/themes/bitrader/assets/js/custom.js?ver=6.5.2" id="bitrader-custom-js"></script>
        <script type="text/javascript" src="/dark/wp-content/plugins/bitrader-core/assets/js/hello-world.js?ver=6.5.2" id="genixcore-js"></script>
        <script type="text/javascript" defer src="/dark/wp-content/plugins/mailchimp-for-wp/assets/js/forms.js?ver=4.9.9" id="mc4wp-forms-api-js"></script>
        <script type="text/javascript" src="/dark/wp-content/plugins/elementor/assets/js/webpack.runtime.min.js?ver=3.16.5" id="elementor-webpack-runtime-js"></script>
        <script type="text/javascript" src="/dark/wp-content/plugins/elementor/assets/js/frontend-modules.min.js?ver=3.16.5" id="elementor-frontend-modules-js"></script>
        <script type="text/javascript" src="/dark/wp-content/plugins/elementor/assets/lib/waypoints/waypoints.min.js?ver=4.0.2" id="elementor-waypoints-js"></script>
        <script type="text/javascript" src="/dark/wp-includes/js/jquery/ui/core.min.js?ver=1.13.2" id="jquery-ui-core-js">
        </script>
        <script type="text/javascript" id="elementor-frontend-js-before">
            /* <![CDATA[ */
            var elementorFrontendConfig = {
                "environmentMode": {
                    "edit": false
                    , "wpPreview": false
                    , "isScriptDebug": false
                }
                , "i18n": {
                    "shareOnFacebook": "Share on Facebook"
                    , "shareOnTwitter": "Share on Twitter"
                    , "pinIt": "Pin it"
                    , "download": "Download"
                    , "downloadImage": "Download image"
                    , "fullscreen": "Fullscreen"
                    , "zoom": "Zoom"
                    , "share": "Share"
                    , "playVideo": "Play Video"
                    , "previous": "Previous"
                    , "next": "Next"
                    , "close": "Close"
                    , "a11yCarouselWrapperAriaLabel": "Carousel | Horizontal scrolling: Arrow Left & Right"
                    , "a11yCarouselPrevSlideMessage": "Previous slide"
                    , "a11yCarouselNextSlideMessage": "Next slide"
                    , "a11yCarouselFirstSlideMessage": "This is the first slide"
                    , "a11yCarouselLastSlideMessage": "This is the last slide"
                    , "a11yCarouselPaginationBulletMessage": "Go to slide"
                }
                , "is_rtl": false
                , "breakpoints": {
                    "xs": 0
                    , "sm": 480
                    , "md": 768
                    , "lg": 1025
                    , "xl": 1440
                    , "xxl": 1600
                }
                , "responsive": {
                    "breakpoints": {
                        "mobile": {
                            "label": "Mobile Portrait"
                            , "value": 767
                            , "default_value": 767
                            , "direction": "max"
                            , "is_enabled": true
                        }
                        , "mobile_extra": {
                            "label": "Mobile Landscape"
                            , "value": 880
                            , "default_value": 880
                            , "direction": "max"
                            , "is_enabled": false
                        }
                        , "tablet": {
                            "label": "Tablet Portrait"
                            , "value": 1024
                            , "default_value": 1024
                            , "direction": "max"
                            , "is_enabled": true
                        }
                        , "tablet_extra": {
                            "label": "Tablet Landscape"
                            , "value": 1200
                            , "default_value": 1200
                            , "direction": "max"
                            , "is_enabled": false
                        }
                        , "laptop": {
                            "label": "Laptop"
                            , "value": 1366
                            , "default_value": 1366
                            , "direction": "max"
                            , "is_enabled": false
                        }
                        , "widescreen": {
                            "label": "Widescreen"
                            , "value": 2400
                            , "default_value": 2400
                            , "direction": "min"
                            , "is_enabled": false
                        }
                    }
                }
                , "version": "3.16.5"
                , "is_static": false
                , "experimentalFeatures": {
                    "e_dom_optimization": true
                    , "e_optimized_assets_loading": true
                    , "e_optimized_css_loading": true
                    , "additional_custom_breakpoints": true
                    , "container": true
                    , "e_swiper_latest": true
                    , "landing-pages": true
                    , "e_global_styleguide": true
                }
                , "urls": {
                    "assets": "https:\/\/bitrader.thetork.com\/dark\/wp-content\/plugins\/elementor\/assets\/"
                }
                , "swiperClass": "swiper"
                , "settings": {
                    "page": []
                    , "editorPreferences": []
                }
                , "kit": {
                    "active_breakpoints": ["viewport_mobile", "viewport_tablet"]
                    , "global_image_lightbox": "yes"
                    , "lightbox_enable_counter": "yes"
                    , "lightbox_enable_fullscreen": "yes"
                    , "lightbox_enable_zoom": "yes"
                    , "lightbox_enable_share": "yes"
                    , "lightbox_title_src": "title"
                    , "lightbox_description_src": "description"
                }
                , "post": {
                    "id": 67
                    , "title": "Bitrader%20%E2%80%93%20Crypto%2C%20Stock%20and%20Forex%20Trading%20WordPress%20Theme"
                    , "excerpt": ""
                    , "featuredImage": false
                }
            };
            /* ]]> */

        </script>
        <script type="text/javascript" src="/dark/wp-content/plugins/elementor/assets/js/frontend.min.js?ver=3.16.5" id="elementor-frontend-js"></script>
</body>

</html>
