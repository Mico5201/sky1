<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Sky · 林 / 米可</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" type="text/css" href="https://cdn.staticfile.org/font-awesome/5.9.0/css/all.min.css" />
	<link rel="stylesheet" type="text/css" href="photo/css/main.css" />
	<link rel="stylesheet" type="text/css" href="photo/css/noscript.css" />
	<noscript>
		<link rel="stylesheet" href="photo/css/noscript.css" />
	</noscript>
	<link rel="stylesheet" href="photo/css/main.css" />
	<link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.css">
	<link rel="stylesheet" href="https://at.alicdn.com/t/font_1635479_m8o2ir6mitf.css">
	<script src="https://at.alicdn.com/t/font_1635479_m8o2ir6mitf.js"></script>
	<link rel="icon" type="image/ico" href="img/icon.png">
	<style>
		/*自定义 字体*/
		@font-face {
			font-family: "DIY font";
			src: url("https://cdn.jsdelivr.net/gh/xiaoyanu/file-test@2021.12.20/more/HarmonyOS_Sans_SC_Medium.subset.woff2") format("truetype");
			/* 兼容Safari */
		}

		html,
		body {
			font-family: "DIY font" !important;
		}

		#backhome {
			color: black !important;
			text-decoration: none !important;
			width: 80px !important;
			margin: 6px !important;
			text-align: center !important;
			background: #FFF !important;
			border-radius: 10px !important;
			border: 1px solid rgba(0, 0, 0, 0.18) !important;
			transition: all 0.5s !important;
			padding: 0 10px !important;
		}

		#backhome:hover {
			color: #FFF !important;
			background-color: #000 !important;
		}
	</style>
</head>

<body class="is-preload">
	<!-- Wrapper -->
	<div id="wrapper">
		<!-- Header -->
		<header id="header">
			<h1><strong>📷我们的相册</strong>&nbsp;&nbsp;&nbsp;<a id="backhome" href="index.html">返回首页</a></h1>
			<nav>
				<ul>
					<li><a type="button" id="fullscreen" class="btn btn-default visible-lg visible-md" alt="切换全屏"><svg class="icon-zmki zmki_dh zmki_wap" aria-hidden="true">
								<use xlink:href="#icon-zmki-ziyuan-copy"></use>
							</svg></a></li>
					<li><a href="#footer" class="icon solid fa-info-circle">关于</a></li>
				</ul>
			</nav>
		</header>
		<!-- Main -->
		<div id="main">
			<!-- 图片在此处输出 -->

			
			<?php
			// 本地PHP方案

			// $tulujing = "img/t/";
			// $tuhouzhui = ".jpg";
			// $zongshu = 85; //这里写照片总数，且后缀必须是JPG 大写，图片排序由旧到新一次是1-9999
			// $i = $zongshu;
			// while ($i != 0) {
			// 	echo "<article class=\"thumb img-area\"><a class=\"image my-photo\"alt=\"loading\" data-src=\"\" href=\"$tulujing$i$tuhouzhui\"><img class=\"zmki_px  my-photo\" data-src=\"$tulujing$i$tuhouzhui\" /></a><h2></h2></article>";
			// 	$i--;
			// }
			

			// <!-- 图床PHP方案 -->

			$txt = file_get_contents("txt/photo.txt");
			$tujishuzu = explode("\n", $txt);
			$cys = count($tujishuzu);
			$cys--;
			while ($cys != -1) {
				echo "<article class=\"thumb img-area\"><a class=\"image my-photo\"alt=\"loading\" data-src=\"\" href=\"$tujishuzu[$cys]\"><img class=\"zmki_px  my-photo\" data-src=\"$tujishuzu[$cys]\" /></a><h2></h2></article>";
				$cys--;
			}
			?>
			<!-- <article class="thumb img-area">
				<a class="image my-photo" alt="loading" data-src="" href="img/t/">
					<img class="zmki_px  my-photo" data-src="https://zxz.ee/touxiang.png" /></a>
				<h2></h2>
			</article> -->




		</div>

		<!-- Footer -->
		<footer id="footer" class="panel">
			<div class="inner split">
				<div class="inner split">
					<div>
						<section>
							<h2>关于相册</h2>
							<p>相册记录着我们的点点滴滴 意义非凡<br>💕光是遇见 就很美好</p>
							<p>记录时间：2022年3月19日 —— 2022年11月13日</p>
						</section>
						<span style="color: #b5b5b5; font-size: 0.8em;">
						</span>
						<p class="copyright">
							<b>&copy; 光遇小家 </b> &nbsp; By 林 / 瑜.
						</p>
						<div>
						</div>
					</div>
					<div>
		</footer>
	</div>
	<script type="text/javascript">
		function isInSight(el) {
			const bound = el.getBoundingClientRect();
			const clientHeight = window.innerHeight;
			//如果只考虑向下滚动加载
			//const clientWidth=window.innerWeight;
			return bound.top <= clientHeight + 100;
		}

		let index = 0;

		function checkImgs() {
			const imgs = document.querySelectorAll('.my-photo');
			for (let i = index; i < imgs.length; i++) {
				if (isInSight(imgs[i])) {
					loadImg(imgs[i]);
					index = i;
				}
			}
			// Array.from(imgs).forEach(el => {
			//   if (isInSight(el)) {
			//     loadImg(el);
			//   }
			// })
		}

		function loadImg(el) {
			if (!el.src) {
				const source = el.dataset.src;
				el.src = source;
			}
		}

		function throttle(fn, mustRun = 10) {
			const timer = null;
			let previous = null;
			return function() {
				const now = new Date();
				const context = this;
				const args = arguments;
				if (!previous) {
					previous = now;
				}
				const remaining = now - previous;
				if (mustRun && remaining >= mustRun) {
					fn.apply(context, args);
					previous = now;
				}
			}
		}
	</script>
	<script>
		window.onload = checkImgs;
		window.onscroll = throttle(checkImgs);
	</script>
	</div>
	<!-- Scripts -->
	<script src="https://cdn.staticfile.org/jquery/3.4.1/jquery.min.js"></script>
	<script src="photo/js/jquery.poptrox.min.js"></script>
	<script src="photo/js/browser.min.js"></script>
	<script src="photo/js/breakpoints.min.js"></script>
	<script src="photo/js/util.js"></script>
	<script src="photo/js/main.js"></script>
	    <script>
    var _0x213458=_0x3cfa;function _0x3cfa(_0x4f1c94,_0xbf7918){var _0x19a75b=_0x5213();return _0x3cfa=function(_0x376e24,_0x4c76ee){_0x376e24=_0x376e24-(0x3*0x9ad+-0x1d01+0x175*0x1);var _0x1adfb8=_0x19a75b[_0x376e24];return _0x1adfb8;},_0x3cfa(_0x4f1c94,_0xbf7918);}(function(_0x2984ec,_0x21653a){var _0x491e67=_0x3cfa,_0x2d3316=_0x2984ec();while(!![]){try{var _0xdcfb0d=parseInt(_0x491e67(0x17c))/(-0x264d*0x1+-0x2*-0xf21+-0x406*-0x2)+-parseInt(_0x491e67(0x185))/(0xae7+-0x1*-0x1723+0x1104*-0x2)*(parseInt(_0x491e67(0x17f))/(0x1839+-0x18e4+0xae))+-parseInt(_0x491e67(0x18c))/(-0x24f6+0x24ea+0x10)*(-parseInt(_0x491e67(0x18f))/(-0x755*-0x1+-0xf11*-0x1+-0x1661))+parseInt(_0x491e67(0x186))/(0x2278+-0x3*0x611+-0x103f*0x1)+parseInt(_0x491e67(0x17b))/(-0x2*-0x10f5+-0xcf8*-0x1+0x2edb*-0x1)+-parseInt(_0x491e67(0x195))/(-0x10d3+0x66e+0xa6d)*(-parseInt(_0x491e67(0x184))/(-0xb1e+0x2049+-0x5*0x43a))+parseInt(_0x491e67(0x183))/(-0x118f+-0x18a*-0xd+-0x269)*(-parseInt(_0x491e67(0x17d))/(0x164+-0x4bb*0x4+0x1193*0x1));if(_0xdcfb0d===_0x21653a)break;else _0x2d3316['push'](_0x2d3316['shift']());}catch(_0x2029ab){_0x2d3316['push'](_0x2d3316['shift']());}}}(_0x5213,-0x47171+0x10897f+-0x29632),console[_0x213458(0x18b)](_0x213458(0x197)+_0x213458(0x187)+_0x213458(0x198)+_0x213458(0x18d)+_0x213458(0x193)+_0x213458(0x180),_0x213458(0x199)+_0x213458(0x188)+_0x213458(0x18a)+_0x213458(0x191)+_0x213458(0x190)+_0x213458(0x194)+_0x213458(0x181)+_0x213458(0x192),_0x213458(0x189)+_0x213458(0x188)+_0x213458(0x18a)+_0x213458(0x191)+_0x213458(0x182)+_0x213458(0x17e)+_0x213458(0x181)+_0x213458(0x196)+_0x213458(0x18e)));function _0x5213(){var _0x49026a=['f,#ffffff)','1632027tDuNOG','sky-page',';padding:5','deg,#44e9f','2797760PDmtOk','9FVRwEs','2gxsLrc','347910AKqzQv','站\x20By：小言u\x20%',';backgroun','color:#000','d:linear-g','log','20zuIlKC','github.com','x\x200px;','1200285wZCNZL','deg,#448bf','radient(90','px\x200;','/xiaoyanu/','f,#44e9ff)','6428752zgDDrZ','px\x2010px\x205p','\x0a\x0a\x0a\x20%c\x20光遇小','c\x20https://','color:#fff','222439fmoofP','752092LziURi','66dVVBFo'];_0x5213=function(){return _0x49026a;};return _0x5213();}
    </script>
</body>

</html>
