    var xhr = new XMLHttpRequest();                 // XMLHttpRequest 객체를 생성한다.

    xhr.onload = function() {                       // When readystate changes

      //if(xhr.status === 200) {                      // If server status was ok
        responseObject = JSON.parse(xhr.responseText);  //서버로 부터 전달된 json 데이터를 responseText 속성을 통해 가져올 수 있다.
    
      // alert(responseObject.culture[0].image);   
	                                                 // parse() 메소드를 호출하여 자바스크립트 객체로 변환한다.

        var newCulture = '';
        
        for (var i = 0; i < responseObject.culture.length; i++) { 
          newCulture += '<section>';
          newCulture += '<img src="' + responseObject.culture[i].image + '" ';
          newCulture += 'alt="' + responseObject.culture[i].ttl + '">';
          newCulture += '<h3>' + responseObject.culture[i].ttl + '</h3>';
          newCulture += '<p>' + responseObject.culture[i].subttl + '</p>';
          newCulture += '<p>' + responseObject.culture[i].detail + '</p>';
          newCulture += '</section>';
        } 
        document.getElementById('cultures').innerHTML = newCulture;
      //}
    };

    xhr.open('GET', 'data/data.json', true);        // 요청을 준비한다.
    xhr.send(null);   // 요청을 전송한다.
