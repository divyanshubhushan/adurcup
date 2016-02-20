<?PHP
if(!isset($_SESSION)){ session_start(); }
require_once("fg_membersite.php");

$fgmembersite = new FGMembersite();

//Provide your site name here
$fgmembersite->SetWebsiteName('adurcup.com');

//Provide the email address where you want to get notifications
$fgmembersite->SetAdminEmail('adurcup@gmail.com');

//Provide your database login details here:
//hostname, user name, password, database name and table name
//note that the script will create the table (for example, fgusers in this case)
//by itself on submitting register.php for the first time
$fgmembersite->InitDB(/*hostname*/'localhost',
                      /*username*/'root',
                      /*password*/'',
                      /*database name*/'adurcup_stuffbin',
                      /*table name*/'disposables_details');

//For better security. Get a random string from this link: http://tinyurl.com/randstr
// and put it here
$fgmembersite->SetRandomKey('75T4PXdaEinxT4m');

?>
