jQuery(document).ready(function(){
jQuery("#submit_form").click(function(){
    var name = jQuery("#givenNameField").val();
jQuery.ajax({
type: 'POST',
url: MyAjax.ajaxurl,
data: {"action": "post_word_count", "givenNameField":name},
success: function(data){
alert(data);
}
});
});
});