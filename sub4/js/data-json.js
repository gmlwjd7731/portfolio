

var xhr = new XMLHttpRequest();                 

xhr.onload = function() {                       
 
                  
    responseObject = JSON.parse(xhr.responseText);  
	                                                 

    var newContent = '';

    newContent += '<h3>활동내용</h3>';
    newContent += '<p class="tit_text3"><span>코카-콜라 음료</span>는 환경안전보건방침에 따라 구체적인 환경목표를 설정하고, 이를 달성하기 위한 세부 실행계획을 수립하여 실천하고 있습니다.<br>2000년부터 전 사업장에 ISO 14001을 구축하여 운영하는 한편, 코카-콜라의 <span>품질, 환경, 안전 및 보건 분야 자체 시스템</span>을 도입해 운영하고 있습니다.<br>또한 정부에서 인증하는 <span>녹색기업 기준</span>을 사업장에 도입, 운영해 글로벌 기준을 준수하고 국내 환경 동향에 앞서 대응하기 위해<br> 2009년 광주공장에 이어 여주공장이 녹색기업으로 지정되었으며, 앞으로도 환경에 대한 관심과 투자를 지속할 예정입니다.</p>';
    newContent += '<table>';
    newContent += '<caption>※ 사업장별 환경경영시스템 인증 및 협약 사항 현황</caption>';
    newContent += '<thead>';
    newContent += '<tr>';
    newContent += '<th>구분</th>';
    newContent += '<th scope="col">여주공장</th>';
    newContent += '<th scope="col">양산공장</th>';
    newContent += '<th scope="col">광주공장</th>';
    newContent += '</tr>';
    newContent += '</thead>';
    newContent += '<tbody>';


    for (var i = 0; i < responseObject.factory.length; i++) { 
      newContent += '<tr>'
      newContent += '<th scope="row">'+ responseObject.factory[i].division + '</th>';
      newContent += '<td>'+ responseObject.factory[i].yeoju + '</td>';
      newContent += '<td>'+ responseObject.factory[i].yangsan + '</td>';
      newContent += '<td>'+ responseObject.factory[i].gwangju + '</td>';
      newContent += '</tr>';
    }
    
    newContent+= '</tbody>';
    newContent+= '</table>';
 
    document.getElementById('content3').innerHTML = newContent;

  
};

xhr.open('GET', 'data/data.json', true);        
xhr.send(null);                                 

