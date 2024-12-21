<?php
include_once "UserClass.php";

// Database connection with error handling
$con = mysqli_connect("localhost", "root", "", "learningplatform");
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

// Form submission handling
if (isset($_POST['submit'])) {
    // Prepared statement to delete usertype_pages
    $stmt = $con->prepare("DELETE FROM usertype_pages WHERE usertypeid = ?");
    $stmt->bind_param("i", $_POST["UserType"]);
    $stmt->execute();

    // Prepared statement to insert new pages for the selected user type
    $stmt = $con->prepare("INSERT INTO usertype_pages (usertypeid, pageid) VALUES (?, ?)");
    foreach ($_POST["choosen-pages"] as $page) {
        $stmt->bind_param("ii", $_POST["UserType"], $page);
        $stmt->execute();
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Permissions</title>
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){            
            $("#btnLeft").click(function () {
                var selectedItem = $("#rightValues option:selected");
                $("#leftValues").append(selectedItem);
            });
            $("#btnRight").click(function () {
                var selectedItem = $("#leftValues option:selected");
                $("#rightValues").append(selectedItem);
            });
        });
    </script>
</head>
<body>
    <form action="" method="post">
        <table>
            <tr>
                <td>All Pages</td>
                <td></td>
                <td>Chosen Pages</td>
            </tr>
            <tr>
                <td>
                    <select id="leftValues" style="width: 160px; box-sizing: border-box;" size="5" multiple>
                        <?php
                        $pages = pages::SelectAllPagesInDB();
                        foreach ($pages as $page) {
                            echo "<option value='" . htmlspecialchars($page->ID) . "'>" . htmlspecialchars($page->FreindlyName) . "</option>";
                        }
                        ?>
                    </select>
                </td>
                <td align="center">
                    <input type="button" id="btnLeft" value="<<" />
                    <input type="button" id="btnRight" value=">>" />
                </td>
                <td>
                    <select id="rightValues" name="choosen-pages[]" style="width: 160px; box-sizing: border-box;" size="5" multiple></select>
                </td>
            </tr>
            <tr>
                <td>Choose User Type:</td>
                <td>
                    <select name="UserType">
                        <?php 
                        $userTypes = UserType::SelectAllUserTypesInDB();
                        foreach ($userTypes as $type) {
                            echo "<option value='" . htmlspecialchars($type->ID) . "'>" . htmlspecialchars($type->UserTypeName) . "</option>";
                        }
                        ?>                          
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>
