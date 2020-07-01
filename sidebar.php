<div class="aside"> 
    <?php  
    if(is_active_sidebar('sidebar'))
    {
    dynamic_sidebar('sidebar');
    } 
    else{?>
    <style>
    .aside {
    width: 0vw;
    border:none;
    }
    .left{
        width: 96vw !important ;
    }
    p{
        max-width: unset;
    }
    #description {
    width: 95vw;
    margin: 0;
    }
    #contenue2 {
    width: 70vw;
    }
    #pagination1 {
    margin-left: 40vw;
    }
    </style>    
    <?php
    }
    ?>
</div>