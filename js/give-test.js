
var tests = [];
var i =-1;
var qid;
var option_selected;
var current_question = 1;
var last_question = 1;
function give_test(professor,test)
{
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function()
      {
      if (this.readyState == 4 && this.status == 200)
        {
        i++;
        tests=JSON.parse(this.responseText);
        document.getElementById("question-paragraph").innerHTML = "<p ><h1>"+tests[i]['question']+"</h1></p>";
        var opt = tests[i]['options'].split('`');
        for(var j = 0;j<opt.length;j++)
          document.getElementById("options").innerHTML += "<input type='radio' name='option' id="+j+" value="+j+" ><div class='opts'>"+opt[j]+"</div><br>";

        for (var k = 0; k < tests.length; k++) {
          document.getElementById("questions").innerHTML += "<a href='#' class='list-group-item' id=question"+tests[k]['qno']+" onclick=' question_list("+k+"); '>"+(k+1)+".  "+tests[k]['question']+"</a> "
        }

        document.getElementById('question'+current_question).style.backgroundColor="White";
        document.getElementById('question'+current_question).style.color="black";
      }

    };
  xmlhttp.open("GET","giveTest.php?test="+test, true);
  xmlhttp.send();
}







function next()
{
  if((i+1) > tests.length-1)
          {alert('last question');
          return;
      }



            i++;
            current_question =i+1;
            document.getElementById("question-paragraph").innerHTML = "<p><h1>"+tests[i]['question']+"</h1></p>";
            var opt1 = tests[i]['options'].split(',');
            document.getElementById("options").innerHTML = "";
            for(var j = 0;j<opt1.length;j++)
            document.getElementById("options").innerHTML += "<input type='radio' name='option' id="+j+" value="+j+" ><div class ='opts'>"+opt1[j]+"</div><br/>";

            document.getElementById('question'+last_question).style.backgroundColor="#5f5f5f";
            document.getElementById('question'+last_question).style.color="white";
            document.getElementById('question'+current_question).style.backgroundColor="White";
            document.getElementById('question'+current_question).style.color="black";

            last_question = current_question;

          check_option();


}













function previous()
{
        if((i-1) < 0)
          alert('first question');
        else
          {
          i--;
          current_question = i+1;
          document.getElementById("question-paragraph").innerHTML = "<p><h1>"+tests[i]['question']+"</h1></p>";
          var opt2 = tests[i]['options'].split(',');
          document.getElementById("options").innerHTML = "";
          for(var j = 0;j<opt2.length;j++)
            document.getElementById("options").innerHTML += "<input type='radio' name='option' id="+j+" value="+j+" ><div class='opts'>"+opt2[j]+"</div><br/>";


            document.getElementById('question'+last_question).style.backgroundColor="#5f5f5f";
            document.getElementById('question'+last_question).style.color="white";
            document.getElementById('question'+current_question).style.backgroundColor="White";
            document.getElementById('question'+current_question).style.color="black";

            last_question = current_question;
          }

          check_option();

}













function check_option(){
  var xmlhttp = new XMLHttpRequest();


      xmlhttp.onreadystatechange = function()
      {
        if (this.readyState == 4 && this.status==200)
        {
          console.log(this.responseText);
          var selected = JSON.parse(this.responseText);


          if (selected["q"+tests[i]['qno']] != 'undefined' && selected["q"+tests[i]['qno']] != null) {
            console.log("checked");
            console.log(selected["q"+tests[i]['qno']]);

            document.getElementById(selected["q"+tests[i]['qno']]).checked = true;
          }
        }


    };
    xmlhttp.open("GET","selected-options.php?show=?", true);
    xmlhttp.send();
}

function option_checked(){
  var o;
  var radios = document.getElementsByName('option');
  for (var k = 0, length = radios.length; k < length; k++)
  {
    if (radios[k].checked) {
        o = radios[k].value;
        // console.log(o);
        break;
    }
  }
  if(k==radios.length)
    o="undefined";

  qid=tests[i]['qno'];
  // console.log(qid);
  option_selected=o;
  // console.log(option_selected);
  return o;

}


function save()
{

  var xmlhttp = new XMLHttpRequest();


      xmlhttp.onreadystatechange = function()
      {
        if (this.readyState == 4 && this.status==200)
        {
          // var a =JSON.parse(this.responseText);
        }


    };
    xmlhttp.open("GET","selected-options.php?question_id="+qid+"&select="+option_selected, true);
    xmlhttp.send();
}




function question_list(index){
          option_checked();
          save();
          i = index;
          current_question = i+1;
          document.getElementById("question-paragraph").innerHTML = "<p><h1>"+tests[i]['question']+"</h1></p>";
          var opt2 = tests[i]['options'].split(',');
          document.getElementById("options").innerHTML = "";
          for(var j = 0;j<opt2.length;j++)
            document.getElementById("options").innerHTML += "<input type='radio' name='option' id="+j+" value="+j+" ><div class='opts'>"+opt2[j]+"</div><br/>";


            document.getElementById('question'+last_question).style.backgroundColor="#5f5f5f";
            document.getElementById('question'+last_question).style.color="white";
            document.getElementById('question'+current_question).style.backgroundColor="White";
            document.getElementById('question'+current_question).style.color="black";

            last_question = current_question;
          check_option();

        }



//function tick(qid)
//{
//  var s=option_checked();
//  alert(s);
//  if(s !== undefined)
//      {
//        alert(qid.id);
//        alert(document.getElementById(qid.id).innerHTML);
//        document.getElementById(qid.id).innerHTML +="<span class='glyphicon glyphicon-ok' style='float:right'></span>"}
////    alert(document.getElementById(qid.id).innerHTML);
//
//
//}


function submit(){

}
