<?php
require_once "inc/html-top.inc.php";

$blog1 = "";
$blog2 = "";
$blog3 = "";

$blognumber = "2";

if(isset($_POST["blognumber"]))
$blognumber = $_POST["blognumber"];

switch($blognumber)
{
    case "1":
        $blog1 = "selected";
    break;
    case "2":
        $blog2 = "selected";
    break;
    case "3":
        $blog3 = "selected";
    break;
    default:
        $blog1 = "selected";
}

?>
<script>
    function onSelect()
    {
        let blog = document.getElementById("blogselect");
        let selected = blog.options[blog.selectedIndex].value;

        let form = document.createElement("form");
        form.setAttribute("method", "POST");
        form.setAttribute("action", "blog.php");
        let input = document.createElement("input");
        input.setAttribute("type", "hidden");
        input.setAttribute("name", "blognumber");
        input.setAttribute("value", selected);
        form.appendChild(input);
        document.body.appendChild(form);
        form.submit();
    }
</script>

    <div class="text_wrapper">
        <h1 class="page-heading">Blogg</h1>
        <select onchange="onSelect();" id="blogselect">
            <option <?php echo $blog1;?> value="1">Hobbyprosjekt, .NET C#</option>
            <option <?php echo $blog2;?> value="2">Teknologien, og alle valgene</option>
            <option <?php echo $blog3;?> value="3">Kommer...</option>
        </select>&nbsp;
        <br><br>
        <?php
        if(isset($_POST["blognumber"]))
        {
            $blognumber = $_POST["blognumber"];
        }
        if(is_int($blognumber))
        {
            require_once "blogs/blog".$blognumber.".php";
        }

        ?>
    </div>
    <br>
    </div>
    </div>
<?php require_once "inc/html-bottom.inc.php";?>