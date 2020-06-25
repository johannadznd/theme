<?php
/**
Template Name: page contact 
*/

$nb1 = rand(1,9);
$nb2 = rand(1,9);

if(isset($_POST['send'])){

    $valid = true;
    $message =array();

    if (empty( $_POST['ctc-nom'])){
        $message['nom'] = "Entrez votre nom";
        $valid = false;
    }

    if (empty( $_POST['ctc-prenom'])){
        $message['prenom'] = "Entrez votre prénom";
        $valid = false;
    }

    if (empty( $_POST['ctc-mail'])){
        $message['mail'] = "Entrez votre mail";
        $valid = false;
    }

    if (empty( $_POST['ctc-message'])){
        $message['message'] = "Entrez votre message";
        $valid = false;
    }

    $captcha = $_POST['captcha'];
    if (empty($captcha)) {
        $message['captcha'] = "Vous n'avez pas saisi le résultat anti-spam";
        $valid = false;
    }
    elseif (!is_numeric($captcha)){
        $message['captcha'] = "Votre saisie anti-spam n'est pas numérique";
        $valid = false ;
    }
    elseif ($captcha != base64_decode($_POST['check1']) + base64_decode($_POST['check2'])){
        $message['captcha'] = "La saisie anti-spam ne correspond pas au resultat";
        $valid = false;
    }

    if ($valid == true  )
    {
        global $wpdb;
        
        $tablename = $wpdb->prefix . "contacts";

        $ctc_data = array(
            'ctc_nom'       => $_POST['ctc-nom'],
            'ctc_prenom'    => $_POST['ctc-prenom'],
            'ctc_mail'      => $_POST['ctc-mail'],
            'ctc_message'   => $_POST['ctc-message'],
            'created_at'    => current_time('mysql', 0 )
        );

        if($wpdb->insert($tablename,$ctc_data)) 
        {
            if(session_id())
            {
                $_SESSION['contact-result'] = "Votre message est envoyé, nous vous répondrons prochainement";
            }
            wp_redirect(home_url());
        } 
    }
}

get_header();
?>
<h2>Nous contacter</h2>
<section  id="sec_art" class="left">

<div id="breadcrumbs"><?php get_breadcrumb(); ?></div>


    <form id="lg-contact" action="<?php the_permalink(); ?>" method="post">
        <p>Utilisez ce formulaire pour nous contacter</p>

        <div class="form-group">
                    <label for="ctc-nom">Nom</label>
                    <?php if (isset($message['nom'])){ ?>
                        <div class="text-white bg-danger px-3"><?php echo $message['nom']; ?></div>
                    <?php } ?>
                     <input type="text" class="form-control" id="ctc-nom" name="ctc-nom" size="50" placeholder="Votre Nom..." value="<?php echo(isset($_POST['ctc-nom'])) ? esc_attr($_POST['ctc-nom']) : '' ; ?>">
                     <small class="text-danger"><b>* Requis</b></small>
                </div>

                <div class="form-group">
                    <label for="ctc-prenom">Prénom</label>
                    <?php if (isset($message['prenom'])){ ?>
                        <div class="text-white bg-danger px-3"><?php echo $message['prenom']; ?></div>
                    <?php } ?>
                     <input type="text" class="form-control" id="ctc-prenom" name="ctc-prenom" size="50" placeholder="Votre prenom..." value="<?php echo(isset($_POST['ctc-prenom'])) ? esc_attr($_POST['ctc-prenom']) : '' ; ?>">
                     <small class="text-danger"><b>* Requis</b></small>
                </div>

                <div class="form-group">
                    <label for="ctc-mail">Email</label>
                    <?php if (isset($message['mail'])){ ?>
                        <div class="text-white bg-danger px-3"><?php echo $message['mail']; ?></div>
                    <?php } ?>
                     <input type="email" class="form-control" id="ctc-mail" name="ctc-mail" size="50" placeholder="Votre email..." value="<?php echo(isset($_POST['ctc-mail'])) ? esc_attr($_POST['ctc-mail']) : '' ; ?>">
                     <small class="text-danger"><b>* Requis</b></small>
                </div>

                <div class="form-group">
                    <label for="ctc-message">Message</label>
                    <?php if (isset($message['message'])){ ?>
                        <div class="text-white bg-danger px-3"><?php echo $message['message']; ?></div>
                    <?php } ?>
                     <textarea class="form-control" id="ctc-message" name="ctc-message" placeholder="Votre message..."><?php echo(isset($_POST['ctc-message'])) ? esc_attr($_POST['ctc-message']) : '' ; ?></textarea>
                     <small class="text-danger"><b>* Requis</b></small>
                </div>

                <div class="form-group">
                    <input type="hidden" name="check1" value="<?php echo base64_encode($nb1) ?>">  
                    <input type="hidden" name="check2" value="<?php echo base64_encode($nb2) ?>">  
                    <p>Anti-Spam, sasir le résultat de l'opération : <?php echo $nb1; ?> + <?php echo $nb2;?></p>
                    <label for="captcha"> dans cette zone : </label>

                    <?php if(isset($message['captcha'])) { ?>
                        <div class="text-white bg-danger px-3"><?php echo $message['captcha']; ?></div>
                    <?php } ?>

                    <input type="text" id="captcha" name="captcha" /><small class="text-danger"><b> * Requis</b></small>
                </div>
                <div class="form-group">
                    <input style=" border:solid 1px" type="submit" class="btn btn-default" id="send" name="send" value="Envoyer">
                </div>
            </form>
        </div>
       
</section>
 <?php get_template_part('sidebar'); ?>
<?php
get_footer();