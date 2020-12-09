var timer	 = false;
var boxsize = 0;
$(window).resize(function() {
	if (timer !== false) {clearTimeout(timer);}
	timer = setTimeout(resizeInit, 200);
});

$(document).ready(function(){
	//初期設定
	resizeInit();
});

$(window).load(function () {
	boxsize = 0;
	resizeInit();
});

function resizeInit(){
	cnt = 0;
	obj = $("#area_gallery .my-gallery figure");
	if(boxsize != obj.width()){
		boxsize = obj.width();
			obj.each(function(i) {
				target		= obj.eq(i).find('img');
				//画像サイズをリセット
				target.css( "width" , "auto" );
				target.css( "height" , "auto" );
				imgwidth	= $(target).width();
				imgheight = $(target).height();
				//縦長画像
				if(imgheight >imgwidth){
					//横をボックスサイズにフィット
					resizeH = Math.floor(imgheight * (boxsize / imgwidth));
					$(target).width(boxsize);
					$(target).height(resizeH);
					//画像の中心とボックス中心を合わせる
					marginT = Math.floor((resizeH - boxsize) / 2);
					$(target).css( "margin-top" , "-" + marginT + "px" );
					//拡大画像のデータサイズを修正
					l_height = 1280;
					l_width  = Math.floor(boxsize * (l_height / resizeH));
					data_size_val = l_width+'x'+l_height;
					obj.eq(i).find('a').attr('data-size',data_size_val);
				}else{
				//横長画像
					//縦をボックスサイズにフィット
					resizeW = Math.floor(imgwidth * (boxsize / imgheight));
					$(target).height(boxsize);
					$(target).width(resizeW);
					//画像の中心とボックス中心を合わせる
					marginL = (resizeW - boxsize) / 2;
					$(target).css( "margin-left" , "-" + marginL + "px" );
					//拡大画像のデータサイズを修正
					l_width  = 1280;
					l_height = Math.floor(boxsize * (l_width / resizeW));
					data_size_val = l_width+'x'+l_height;
					obj.eq(i).find('a').attr('data-size',data_size_val);
				}
			});
	}
}

var initPhotoSwipeFromDOM = function( gallerySelector ) {

		// parse slide data (url, title, size ...) from DOM elements 
		// (children of gallerySelector)
		var parseThumbnailElements = function(el) {
				var thumbElements = el.childNodes,
						numNodes = thumbElements.length,
						items = [],
						figureEl,
						linkEl,
						size,
						item;

				for(var i = 0; i < numNodes; i++) {

						figureEl = thumbElements[i]; // <figure> element

						// include only element nodes 
						if(figureEl.nodeType !== 1) {
								continue;
						}

						linkEl = figureEl.children[0]; // <a> element

						size = linkEl.getAttribute('data-size').split('x');

						// create slide object
						item = {
								src: linkEl.getAttribute('href'),
								w: parseInt(size[0], 10),
								h: parseInt(size[1], 10)
						};



						if(figureEl.children.length > 1) {
								// <figcaption> content
								item.title = figureEl.children[1].innerHTML; 
						}

						if(linkEl.children.length > 0) {
								// <img> thumbnail element, retrieving thumbnail url
								item.msrc = linkEl.children[0].getAttribute('src');
						} 

						item.el = figureEl; // save link to element for getThumbBoundsFn
						items.push(item);
				}

				return items;
		};

		// find nearest parent element
		var closest = function closest(el, fn) {
				return el && ( fn(el) ? el : closest(el.parentNode, fn) );
		};

		// triggers when user clicks on thumbnail
		var onThumbnailsClick = function(e) {
				e = e || window.event;
				e.preventDefault ? e.preventDefault() : e.returnValue = false;

				var eTarget = e.target || e.srcElement;

				// find root element of slide
				var clickedListItem = closest(eTarget, function(el) {
						return (el.tagName && el.tagName.toUpperCase() === 'FIGURE');
				});

				if(!clickedListItem) {
						return;
				}

				// find index of clicked item by looping through all child nodes
				// alternatively, you may define index via data- attribute
				var clickedGallery = clickedListItem.parentNode,
						childNodes = clickedListItem.parentNode.childNodes,
						numChildNodes = childNodes.length,
						nodeIndex = 0,
						index;

				for (var i = 0; i < numChildNodes; i++) {
						if(childNodes[i].nodeType !== 1) { 
								continue; 
						}

						if(childNodes[i] === clickedListItem) {
								index = nodeIndex;
								break;
						}
						nodeIndex++;
				}



				if(index >= 0) {
						// open PhotoSwipe if valid index found
						openPhotoSwipe( index, clickedGallery );
				}
				return false;
		};

		// parse picture index and gallery index from URL (#&pid=1&gid=2)
		var photoswipeParseHash = function() {
				var hash = window.location.hash.substring(1),
				params = {};

				if(hash.length < 5) {
						return params;
				}

				var vars = hash.split('&');
				for (var i = 0; i < vars.length; i++) {
						if(!vars[i]) {
								continue;
						}
						var pair = vars[i].split('=');	
						if(pair.length < 2) {
								continue;
						}					 
						params[pair[0]] = pair[1];
				}

				if(params.gid) {
						params.gid = parseInt(params.gid, 10);
				}

				if(!params.hasOwnProperty('pid')) {
						return params;
				}
				params.pid = parseInt(params.pid, 10);
				return params;
		};

		var openPhotoSwipe = function(index, galleryElement, disableAnimation) {
				var pswpElement = document.querySelectorAll('.pswp')[0],
						gallery,
						options,
						items;

				items = parseThumbnailElements(galleryElement);

				// define options (if needed)
				options = {
						index: index,

						// define gallery index (for URL)
						galleryUID: galleryElement.getAttribute('data-pswp-uid'),

						getThumbBoundsFn: function(index) {
								// See Options -> getThumbBoundsFn section of documentation for more info
								var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
										pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
										rect = thumbnail.getBoundingClientRect(); 

								return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
						}

				};

				if(disableAnimation) {
						options.showAnimationDuration = 0;
				}

				// Pass data to PhotoSwipe and initialize it
				gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
				gallery.init();
		};

		// loop through all gallery elements and bind events
		var galleryElements = document.querySelectorAll( gallerySelector );

		for(var i = 0, l = galleryElements.length; i < l; i++) {
				galleryElements[i].setAttribute('data-pswp-uid', i+1);
				galleryElements[i].onclick = onThumbnailsClick;
		}

		// Parse URL and open gallery if it contains #&pid=3&gid=1
		var hashData = photoswipeParseHash();
		if(hashData.pid > 0 && hashData.gid > 0) {
				openPhotoSwipe( hashData.pid - 1 ,	galleryElements[ hashData.gid - 1 ], true );
		}
};

// PhotoSwipeを起動する
initPhotoSwipeFromDOM( '.my-gallery' );