var livesearch = document.getElementById('livesearch');
$('#search').keyup(function() {
    if(this.value != '')
    {
        makeSearch();
    }else{
        livesearch.style.display="none";    
    }
});
function makeSearch()
{
    $.ajax({
        url: '/search/'+ $('#search')[0].value,
        success: function(data){
            livesearch.innerHTML=data;
            if(data){
                livesearch.style.display="block";
            }
        }
    });
}
$('#search').blur(function(){
    setTimeout(function() {
        livesearch.style.display="none";
    }, 300);
    
});
