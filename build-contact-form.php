<?php 

//Création d'une tale contact

function jd_create_table_contact()  {
	global $wpdb;
	$tablename = $wpdb->prefix . "contacts";	

	if ( $wpdb->get_var("SHOW TABLES LIKE '$tablename'") != $tablename) {

		$sql = "CREATE TABLE `$tablename` (
		  `ctc_id` bigint(20) NOT NULL AUTO_INCREMENT,
		  `created_at` datetime,  
		  `ctc_nom` varchar(35) NOT NULL,
          `ctc_prenom` varchar(35) NOT NULL,
		  `ctc_mail` varchar(35) NOT NULL,
		  `ctc_message` text NOT NULL,
		  PRIMARY KEY (`ctc_id`),
		  INDEX (created_at)
		  ) ENGINE=innoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;"; 
	}

		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

		dbDelta($sql);

}

add_action( "after_switch_theme", "jd_create_table_contact" );



//Création du menu message
function jd_contact_create_menu() {
	add_menu_page( 'messages', 'Messages', 'edit_pages', 'messages_recus' , 'jd_create_page_contact', 'dashicons-email-alt', 6);
}  

//Recherche dans la base de donnée
function jd_create_page_contact() {

	global $wpdb;
	$tablename = $wpdb->prefix . "contacts";	

	$sql = "SELECT *, DATE_FORMAT(created_at, '%e/%m/%Y à %H:%i') AS date_formatted
			FROM `$tablename`
			ORDER BY `created_at` DESC";
	$result = $wpdb->get_results( $sql, OBJECT);   ?>



<style>
table {
    width: 90%;
    margin:auto;
    border:1px solid black;
    border-collapse:collapse;
}
td, th{
    border:1px solid black;
    padding:1vw;
    text-align: center;
}

h1{
    text-align: center;
    margin: 2vw;
}

.tempo { 
    cursor: default;
}
</style> 

	<h1>Liste des messages reçus</h1>
		<table id="table-messages" class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Date</th>
                    <th>Nom</th>
                	<th>Prénom</th>
					<th>Email</th>
					<th>Message</th>
					<th>&nbsp;</th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($result as $res){
					echo '<tr>';
					echo '<td>', $res->ctc_id, '</td>';
					echo '<td>', $res->date_formatted, '</td>';
                    echo '<td>', $res->ctc_nom, '</td>';
                    echo '<td>', $res->ctc_prenom, '</td>';
					echo '<td>', $res->ctc_mail, '</td>';
					echo '<td>', stripslashes($res->ctc_message), '</td>';
					echo '<td><a class="deletable button" data-id="',$res->ctc_id,'">X</a></td>';
					echo '</tr>';
				} ?>
			</tbody>
		</table>
	
<?php
}  


add_action( 'admin_menu', 'jd_contact_create_menu');

