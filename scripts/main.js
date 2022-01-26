function onClickMapAccept() {
	var mapIframe = document.querySelector('.click__map iframe');
	var mapInfo = document.querySelector('.click__map .click__map__text');
	var mapUrl = mapIframe.attributes["data-url"].value;
	mapIframe.src = mapUrl;
	mapInfo.remove();
}
