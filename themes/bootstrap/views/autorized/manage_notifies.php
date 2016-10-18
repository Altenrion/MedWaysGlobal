
<!-- BEGIN CONTENT HEADER -->
<section class="content-header">
    <i class="fa fa-user"></i>
    <span>Управление Записями</span>
    <ol class="breadcrumb">
        <li>Кабинет</li>
        <li class="active">Управление</li>
    </ol>
</section>
<!-- END CONTENT HEADER -->



<section class="content">

    <div class="row ">

        <div class="col-sm-12 ">

                <ul class="nav nav-tabs">
                    <li class="active"><a href="#home" data-toggle="tab">Новости</a></li>
                    <li class=""><a href="#profile" data-toggle="tab">Оповещения</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <p class="lead">Basic Tabs 1</p>
                        <? $this->actionNewsList(); ?>

                    </div>
                    <div class="tab-pane" id="profile">
                        <p class="lead">Basic Tabs 2</p>
                        <? $this->actionNotifiesList(); ?>
                    </div>

                </div>






        </div><!--/col-->

    </div><!--/profile-->


</section>