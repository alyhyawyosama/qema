
    if (window.XMLHttpRequest ) 
{
    var myReq = new XMLHttpRequest();

}else
{
var myReq= new ActiveXObject("Microsoft,XMLHTTP");
}

function show() {
myReq.open("POST","data.php",true);
myReq.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
myReq.send();



myReq.onreadystatechange=function(){
    var myResponsDiv = document.getElementById("result");
    if (myReq.status==200 && myReq.readyState==4)
    {
        myResponsDiv.innerHTML= myReq.responseText ;
    }

    else if(myReq.readyState <  4){
        myResponsDiv.innerHTML="<h1>Loading</h1>";
    }

    else myResponsDiv.innerHTML = "<h1>Error</h1>";
}

}




function del(id) {
    myReq.open("POST","delete.php",true);
    myReq.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    myReq.send("id="+id);
    

    
    myReq.onreadystatechange=function(){
        if (myReq.status==200 && myReq.readyState==4)
        {
            show();
        }
    
    }
    
    }

    
function insert() {
    var name = document.getElementById("wname").value;
    var phone = document.getElementById("wphone").value,
        amount = document.getElementById("wamount").value,
        date = document.getElementById("wdate").value,
        jop = document.getElementById("wjop").value;




    myReq.open("POST","updatedata.php",true);
    myReq.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    myReq.send("wname="+name+"&wphone="+phone+"&wamount="+amount+"&wdate="+date+"&wjop="+jop);
 
    
    
    
    myReq.onreadystatechange=function(){
        if (myReq.status==200 && myReq.readyState==4)
        {
            
        }
    
    }
    
   }

