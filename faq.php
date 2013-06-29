<!doctype html>
<html>
	<head>
		<title>Hangouts</title>
		<style>
		#page{
    width:753px;
    margin:50px auto;
}

#headingSection{
    background-color:#7b8b98;
    padding:40px;
    padding-left:60px;
    position:relative;
    border:1px solid #8b9ba7;
    border-bottom:none;
}

#faqSection{
    background:url('img/faq_bg.jpg') repeat-y #fff;
    padding:20px 90px 60px 60px;
    border:1px solid white;
    text-shadow:1px 1px 0 white;
}

h1{
    color:#fff;
    font-size:36px;
    font-weight:normal;
}

/* The expand / collapse button */

a.button{
    background:url('img/buttons.png') no-repeat;
    width:80px;
    height:38px;
    position:absolute;
    right:50px;
    top:45px;
    text-indent:-9999px;
    overflow:hidden;
    border:none !important;
}

a.button.expand:hover{ background-position:0 -38px;}
a.button.collapse{ background-position:0 -76px;}
a.button.collapse:hover{ background-position:0 bottom;}
			/* Definition Lists */

dt{
    color:#8F9AA3;
    font-size:25px;
    margin-top:30px;
    padding-left:25px;
    position:relative;
    cursor:pointer;
    border:1px solid transparent;
}

dt:hover{ color:#5f6a73;}

dt .icon{
    background:url('img/bullets.png') no-repeat;
    height:12px;
    left:0;
    position:absolute;
    top:11px;
    width:12px;
}

dt.opened .icon{ background-position:left bottom;}

dd{
    font-size:14px;
    color:#717f89;
    line-height:1.5;
    padding:20px 0 0 25px;
    width:580px;
    display:none;
}

		</style>
	</head>
	<body>
		<div id="page">

    <div id="headingSection">
    	<h1>Frequently Asked Questions</h1>
        <a class="button expand" href="#">Expand</a>
    </div>

    <div id="faqSection">
    	<!-- The FAQs are inserted here -->
    </div>

</div>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script>
			$(document).ready(function(){

    // The published URL of your Google Docs spreadsheet as CSV:
    var csvURL = 'https://spreadsheets.google.com/pub?key='+
            '0Av5FtTlofzdRdGdXZEd0WUJfQXc0WVRSUGNFN3RMUVE&output=csv';

    // The YQL address:
    var yqlURL =	"http://query.yahooapis.com/v1/public/yql?q="+
            "select%20*%20from%20csv%20where%20url%3D'"+encodeURIComponent(csvURL)+
            "'%20and%20columns%3D'question%2Canswer'&format=json&callback=?";

    $.getJSON(yqlURL,function(msg){

        var dl = $('<dl>');

        // Looping through all the entries in the CSV file:
        $.each(msg.query.results.row,function(){

            // Sometimes the entries are surrounded by double quotes. This is why
            // we strip them first with the replace method:

            var answer = this.answer.replace(/""/g,'"').replace(/^"|"$/g,'');
            var question = this.question.replace(/""/g,'"').replace(/^"|"$/g,'');

            // Formatting the FAQ as a definition list: dt for the question
            // and a dd for the answer.

            dl.append('<dt><span class="icon"></span>'+
            question+'</dt><dd>'+answer+'</dd>');
        });

        // Appending the definition list:
        $('#faqSection').append(dl);

        $('dt').live('click',function(){
            var dd = $(this).next();

            // If the title is clicked and the dd is not currently animated,
            // start an animation with the slideToggle() method.

            if(!dd.is(':animated')){
                dd.slideToggle();
                $(this).toggleClass('opened');
            }

        });

        $('a.button').click(function(){

            // To expand/collapse all of the FAQs simultaneously,
            // just trigger the click event on the DTs

            if($(this).hasClass('collapse')){
                $('dt.opened').click();
            }
            else $('dt:not(.opened)').click();

            $(this).toggleClass('expand collapse');

            return false;
        });

    });
});
		</script>
	</body>
</html>