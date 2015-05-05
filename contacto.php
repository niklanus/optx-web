	<?php include_once("includes/header.php") ?>

	<section class="nav-extend">
		<div class="jumbotron">
			<div class="container">
				<h2>Contacto</h2>
			</div>
		</div>

		<div class="container service-text">
			<div class="row cf">
				<div class="col-sm-6">
					<div class="contact-form" id="contact-form">
						<div class="contact-form-body">
							<h3>Formulario de contacto</h3>
							<input name="contact-name" type="text" placeholder="Nombre" required="true" autofocus>
							<input name="contact-email" type="email" placeholder="Email" required="true">
							<input name="contact-tel" type="tel" placeholder="Teléfono">
							<textarea name="contact-msg" placeholder="Su mensaje..." required="true"></textarea>
							<input class="btn btn-success btn-lg" id="contact-submit" type="submit" value="Enviar">
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.0006014604087!2d-58.46779620000001!3d-34.604146300000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcc9fe6e49940f%3A0xa623dc0f36f5b5e!2sS%C3%A1nchez+2137%2C+Buenos+Aires%2C+Ciudad+Aut%C3%B3noma+de+Buenos+Aires!5e0!3m2!1ses-419!2sar!4v1428368864837" frameborder="0" class="google-map"></iframe>
				</div>
			</div>
		</div>
	</section>

	<?php include_once("includes/footer.php") ?>

	<!-- AJAX FORM -->
	<script type="text/javascript">
		$(document).ready(function() {
			$("#contact-submit").click(function() { 
			    var proceed = true;
			    //simple validation at client's end
			    //loop through each field and we simply change border color to red for invalid fields       
			    $("#contact-form input[required=true], #contact-form textarea[required=true]").each(function(){
			        $(this).css('border-color',''); 
			        if(!$.trim($(this).val())){ //if this field is empty 
			            $(this).css('border-color','red'); //change border color to red   
			            proceed = false; //set do not proceed flag
			        }
			        //check invalid email
			        var email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
			        if($(this).attr("type")=="email" && !email_reg.test($.trim($(this).val()))){
			            $(this).css('border-color','red'); //change border color to red   
			            proceed = false; //set do not proceed flag              
			        }   
			    });
			   
			    if(proceed) //everything looks good! proceed...
			    {
			        //get input field values data to be sent to server
			        post_data = {
			            'name' : $('input[name=contact-name]').val(),
			            'email': $('input[name=contact-email]').val(), 
			            'tel'  : $('input[name=contact-tel]').val(),
			            'msg'  : $('textarea[name=contact-msg]').val()
			        };
			        
			        //Ajax post data to server
			        $.post('contact-form.php', post_data, function(response){  
			            if(response.type == 'error'){ //load json data from server and output message     
			                output = '<div class="error">'+response.text+'</div>';
			            }else{
			                output = '<div class="success">'+response.text+'</div>';
			                //reset values in all input fields
			                $("#contact-form input[required=true], #contact-form textarea[required=true]").val(''); 
			                $("#contact-form .contact-form-body").slideUp(); //hide form after success
			            }
			            $("#contact-form .contact-form-body").hide().html(output).slideDown();
			        }, 'json');
			    }
			});

			//reset previously set border colors and hide all message on .keyup()
			$("#contact-form input[required=true], #contact-form textarea[required=true]").keyup(function() { 
			    $(this).css('border-color',''); 
			    $("#result").slideUp();
			});
		});
	</script>

	<script>
		!function(a){"use strict";function b(){}function c(){try{return document.activeElement}catch(a){}}function d(a,b){for(var c=0,d=a.length;d>c;c++)if(a[c]===b)return!0;return!1}function e(a,b,c){return a.addEventListener?a.addEventListener(b,c,!1):a.attachEvent?a.attachEvent("on"+b,c):void 0}function f(a,b){var c;a.createTextRange?(c=a.createTextRange(),c.move("character",b),c.select()):a.selectionStart&&(a.focus(),a.setSelectionRange(b,b))}function g(a,b){try{return a.type=b,!0}catch(c){return!1}}function h(a,b){if(a&&a.getAttribute(B))b(a);else for(var c,d=a?a.getElementsByTagName("input"):N,e=a?a.getElementsByTagName("textarea"):O,f=d?d.length:0,g=e?e.length:0,h=f+g,i=0;h>i;i++)c=f>i?d[i]:e[i-f],b(c)}function i(a){h(a,k)}function j(a){h(a,l)}function k(a,b){var c=!!b&&a.value!==b,d=a.value===a.getAttribute(B);if((c||d)&&"true"===a.getAttribute(C)){a.removeAttribute(C),a.value=a.value.replace(a.getAttribute(B),""),a.className=a.className.replace(A,"");var e=a.getAttribute(I);parseInt(e,10)>=0&&(a.setAttribute("maxLength",e),a.removeAttribute(I));var f=a.getAttribute(D);return f&&(a.type=f),!0}return!1}function l(a){var b=a.getAttribute(B);if(""===a.value&&b){a.setAttribute(C,"true"),a.value=b,a.className+=" "+z;var c=a.getAttribute(I);c||(a.setAttribute(I,a.maxLength),a.removeAttribute("maxLength"));var d=a.getAttribute(D);return d?a.type="text":"password"===a.type&&g(a,"text")&&a.setAttribute(D,"password"),!0}return!1}function m(a){return function(){P&&a.value===a.getAttribute(B)&&"true"===a.getAttribute(C)?f(a,0):k(a)}}function n(a){return function(){l(a)}}function o(a){return function(){i(a)}}function p(a){return function(b){return v=a.value,"true"===a.getAttribute(C)&&v===a.getAttribute(B)&&d(x,b.keyCode)?(b.preventDefault&&b.preventDefault(),!1):void 0}}function q(a){return function(){k(a,v),""===a.value&&(a.blur(),f(a,0))}}function r(a){return function(){a===c()&&a.value===a.getAttribute(B)&&"true"===a.getAttribute(C)&&f(a,0)}}function s(a){var b=a.form;b&&"string"==typeof b&&(b=document.getElementById(b),b.getAttribute(E)||(e(b,"submit",o(b)),b.setAttribute(E,"true"))),e(a,"focus",m(a)),e(a,"blur",n(a)),P&&(e(a,"keydown",p(a)),e(a,"keyup",q(a)),e(a,"click",r(a))),a.setAttribute(F,"true"),a.setAttribute(B,T),(P||a!==c())&&l(a)}var t=document.createElement("input"),u=void 0!==t.placeholder;if(a.Placeholders={nativeSupport:u,disable:u?b:i,enable:u?b:j},!u){var v,w=["text","search","url","tel","email","password","number","textarea"],x=[27,33,34,35,36,37,38,39,40,8,46],y="#ccc",z="placeholdersjs",A=new RegExp("(?:^|\\s)"+z+"(?!\\S)"),B="data-placeholder-value",C="data-placeholder-active",D="data-placeholder-type",E="data-placeholder-submit",F="data-placeholder-bound",G="data-placeholder-focus",H="data-placeholder-live",I="data-placeholder-maxlength",J=100,K=document.getElementsByTagName("head")[0],L=document.documentElement,M=a.Placeholders,N=document.getElementsByTagName("input"),O=document.getElementsByTagName("textarea"),P="false"===L.getAttribute(G),Q="false"!==L.getAttribute(H),R=document.createElement("style");R.type="text/css";var S=document.createTextNode("."+z+" {color:"+y+";}");R.styleSheet?R.styleSheet.cssText=S.nodeValue:R.appendChild(S),K.insertBefore(R,K.firstChild);for(var T,U,V=0,W=N.length+O.length;W>V;V++)U=V<N.length?N[V]:O[V-N.length],T=U.attributes.placeholder,T&&(T=T.nodeValue,T&&d(w,U.type)&&s(U));var X=setInterval(function(){for(var a=0,b=N.length+O.length;b>a;a++)U=a<N.length?N[a]:O[a-N.length],T=U.attributes.placeholder,T?(T=T.nodeValue,T&&d(w,U.type)&&(U.getAttribute(F)||s(U),(T!==U.getAttribute(B)||"password"===U.type&&!U.getAttribute(D))&&("password"===U.type&&!U.getAttribute(D)&&g(U,"text")&&U.setAttribute(D,"password"),U.value===U.getAttribute(B)&&(U.value=T),U.setAttribute(B,T)))):U.getAttribute(C)&&(k(U),U.removeAttribute(B));Q||clearInterval(X)},J);e(a,"beforeunload",function(){M.disable()})}}(this),function(a,b){"use strict";var c=a.fn.val,d=a.fn.prop;b.Placeholders.nativeSupport||(a.fn.val=function(a){var b=c.apply(this,arguments),d=this.eq(0).data("placeholder-value");return void 0===a&&this.eq(0).data("placeholder-active")&&b===d?"":b},a.fn.prop=function(a,b){return void 0===b&&this.eq(0).data("placeholder-active")&&"value"===a?"":d.apply(this,arguments)})}(jQuery,this);
	</script>
</body>
</html>