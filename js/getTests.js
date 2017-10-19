

function getTests(professor){
	//alert(professor);
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var tests=JSON.parse(this.responseText);
                var parent=document.getElementById("list-test");
                for(var i=0;i<tests.length;i++){
                	var option=document.createElement("option");
                	option.setAttribute("value",tests[i][0]);
                	option.setAttribute("name","test");
                	option.innerHTML=tests[i][1];
                	parent.appendChild(option);
                	//console.log(option);

                }

            }
        };
        xmlhttp.open("GET","get-test.php?name="+professor, true);
        xmlhttp.send();
}