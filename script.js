$(document).ready(function(){
 
var tab = document.getElementById("tab")
function image(im){
    var image =''
          for(i=0; i < im.length; i++){
            
            
             image  +=  '<img src="'+im[i]+'" alt="" srcset="" height=200 class="w-100">'
           
             
      }
      return image
   }
    fetch("index.php").then(response=>response.json())
.then(data =>{
    for(t=0; t<data.length; t++){

        tab.innerHTML += ` <tr >
 <td >${data[t].id}</td>
 <td>${data[t].name}</td>
 <td>${data[t].price}</td>
 <td>${data[t].offer}</td>
 <td>${data[t].count}</td>
 <td>${data[t].brand}</td>
 <td>${data[t].cat}</td>
 <td class='text-light'>${data[t].des}</td>
 <td >${data[t].date}</td>
 <td class ="images">${image(data[t].cover)}</td>
</tr>
        `
        }
       

})

var dis = document.getElementById("dis")
fetch("cat.php").then(response=>response.json())
.then(data1 =>{
    for(q=0; q<data1.length; q++){
        dis.innerHTML += ` <div class="col-lg-3 col-md-6 col-sm-12">
            <button data-filter ="${data1[q].cat}" class= "category btn btn-warning">${data1[q].cat}</button>
            </div>`
            
        }
        
     
        $(".category").click(function(){
          
          var cat = $(this).attr("data-filter")
            console.log(cat)
            fetch('index.php?cat='+cat+'').then(response=>response.json())
            .then(data =>{
                console.log(data)
                var con =''
                for(l=0; l<data.length; l++){
                     tab.innerHTML ='' 
                   con += ` <tr >
             <td >${data[l].id}</td>
             <td>${data[l].name}</td>
             <td>${data[l].price}</td>
             <td>${data[l].offer}</td>
             <td>${data[l].count}</td>
             <td>${data[l].brand}</td>
             <td>${data[l].cat}</td>
             <td class='text-light'>${data[l].des}</td>
             <td >${data[l].date}</td>
             <td class ="images">${image(data[l].cover)}</td>
            </tr> `
                 tab.innerHTML+=con 
                    } 
            })
            
            })
})

})







