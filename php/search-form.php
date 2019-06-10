<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<link rel="stylesheet" href="css/search-form.css">
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){

        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("php/backend-search.php", {term: inputVal}).done(function(data){
         
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    

    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
</head>
<body>
    <div class="search-box">
        <input type="text" autocomplete="off" placeholder="Entrez votre recherche" />
        <div class="result"></div>
    </div>
</body>
</html>