    var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
    mapOption = { 
        center: new kakao.maps.LatLng(37.5762573,126.8894773), // 지도의 중심좌표
        level: 3 // 지도의 확대 레벨
    };
    
    var map = new kakao.maps.Map(mapContainer, mapOption);
    
    // 지도 확대 축소를 제어할 수 있는  줌 컨트롤을 생성합니다
    var zoomControl = new kakao.maps.ZoomControl();
    map.addControl(zoomControl, kakao.maps.ControlPosition.RIGHT);
    
    // 지도가 확대 또는 축소되면 마지막 파라미터로 넘어온 함수를 호출하도록 이벤트를 등록합니다
    kakao.maps.event.addListener(map, 'zoom_changed', function() {        
        
        // 지도의 현재 레벨을 얻어옵니다
        var level = map.getLevel();
        
        // var message = '현재 지도 레벨은 ' + level + ' 입니다';
        // var resultDiv = document.getElementById('result');  
        // resultDiv.innerHTML = message;
        
    });
    
    // 마커가 표시될 위치입니다 
    var markerPosition  = new kakao.maps.LatLng(37.5759069,126.8906596); 
    
    // 마커를 생성합니다
    var marker = new kakao.maps.Marker({
        position: markerPosition
    });
    
    // 마커가 지도 위에 표시되도록 설정합니다
    marker.setMap(map);
    
    var iwContent = '<div style="width: max-content; padding:5px; color: black;" >서울특별시 마포구 매봉산로 37 606호(상암동 DMC 산학협력연구센터)<br><a href="https://map.kakao.com/link/map/엠폴시스템,37.5759069,126.8906596" style="color:blue" target="_blank">큰지도보기</a> <a href="https://map.kakao.com/link/to/엠폴시스템,37.5759069,126.8906596" style="color:blue" target="_blank">길찾기</a></div>', // 인포윈도우에 표출될 내용으로 HTML 문자열이나 document element가 가능합니다
    iwPosition = new kakao.maps.LatLng(37.5759069,126.8906596); //인포윈도우 표시 위치입니다
    
    // 인포윈도우를 생성합니다
    var infowindow = new kakao.maps.InfoWindow({
        position : iwPosition, 
        content : iwContent 
    });
    
    // 마커 위에 인포윈도우를 표시합니다. 두번째 파라미터인 marker를 넣어주지 않으면 지도 위에 표시됩니다
    infowindow.open(map, marker); 
    
    // 지도 타입 정보를 가지고 있을 객체입니다
    // map.addOverlayMapTypeId 함수로 추가된 지도 타입은
    // 가장 나중에 추가된 지도 타입이 가장 앞에 표시됩니다
    // 이 예제에서는 지도 타입을 추가할 때 지적편집도, 지형정보, 교통정보, 자전거도로 정보 순으로 추가하므로
    // 자전거 도로 정보가 가장 앞에 표시됩니다
    var mapTypes = {
        terrain : kakao.maps.MapTypeId.TERRAIN,    
        traffic :  kakao.maps.MapTypeId.TRAFFIC,
        bicycle : kakao.maps.MapTypeId.BICYCLE,
        useDistrict : kakao.maps.MapTypeId.USE_DISTRICT
    };
    
    // 체크 박스를 선택하면 호출되는 함수입니다
    function setOverlayMapTypeId() {
        var chkTerrain = document.getElementById('chkTerrain'),  
        chkTraffic = document.getElementById('chkTraffic'),
        chkBicycle = document.getElementById('chkBicycle'),
        chkUseDistrict = document.getElementById('chkUseDistrict');
        
        // 지도 타입을 제거합니다
        for (var type in mapTypes) {
            map.removeOverlayMapTypeId(mapTypes[type]);    
        }
        
        // 지적편집도정보 체크박스가 체크되어있으면 지도에 지적편집도정보 지도타입을 추가합니다
        if (chkUseDistrict.checked) {
            map.addOverlayMapTypeId(mapTypes.useDistrict);    
        }
        
        // 지형정보 체크박스가 체크되어있으면 지도에 지형정보 지도타입을 추가합니다
        if (chkTerrain.checked) {
            map.addOverlayMapTypeId(mapTypes.terrain);    
        }
        
        // 교통정보 체크박스가 체크되어있으면 지도에 교통정보 지도타입을 추가합니다
        if (chkTraffic.checked) {
            map.addOverlayMapTypeId(mapTypes.traffic);    
        }
        
        // 자전거도로정보 체크박스가 체크되어있으면 지도에 자전거도로정보 지도타입을 추가합니다
        if (chkBicycle.checked) {
            map.addOverlayMapTypeId(mapTypes.bicycle);    
        }
        
    }
    