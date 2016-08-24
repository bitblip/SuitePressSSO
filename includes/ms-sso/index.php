<?php
session_start();
?>
<html>
<head>
 <title>sso with membersuite sdk</title>   
</head>    
 <body>
       <form method="post" action="RedirectToPortal.php">
       <span style="color:red;"><?php if(isset($_SESSION['loginerr'])){ echo $_SESSION['loginerr'];$_SESSION['loginerr']='';}?></span>
        <table width="80%" cellpadding="5" cellspacing="5">
            
            <tr>
                <td align="left"> Portal User Name:</td>
                <td align="left"><input type="text" name="portalusername" id="portalusername"></td>
            </tr>
            
            <tr>
                <td align="left"> Portal Password (optional):</td>
                <td align="left"><input type="password" name="portalpassword" id="portalpassword"></td>
            </tr>
            
            <tr>
                <td align="left" colspan="2">
                Leave the box below checked if you do not want to verify the password before initiating single sign on.
                  <input type="checkbox" name="varifycredentials" id="varifycredentials" value="1" checked="checked">   
                    
                </td>
                
            </tr>
             <tr>
                <td align="left" colspan="2">
                <input type="submit" name="submit" value="Login"> 
                    
                </td>
                
            </tr>
        </table>
       </form> 
 </body>   
</html>