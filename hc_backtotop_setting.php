<?php
defined('EMLOG_ROOT') || exit('access denied!');

function plugin_setting_view() {
    $plugin_storage = Storage::getInstance('hc_backtotop');
    $name = $plugin_storage->getValue('name');
    $backgroundcolor = $plugin_storage->getValue('backgroundcolor');
    $hovercolor = $plugin_storage->getValue('hovercolor');
    ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">返回顶部</h1>
    </div>
    <div class="card shadow mb-4 mt-2">
        <div class="card-body">
            <form method="post" id="tips_form" action="./plugin.php?plugin=hc_backtotop&action=setting">
                <div class="form">
                    <div class="form-group">
                        <label>按钮</label>
                        <input class="form-control" type="text" style="width: 200px;" name="name" id="name" required="" value="<?= $name ?>">
                    </div>
                    
                    <div class="form-group">
                        <label>背景色</label>
                        <input class="form-control" type="color" style="width: 200px;" name="backgroundcolor" id="backgroundcolor" required="" value="<?= $backgroundcolor ?>">
                    </div>
                    
                    <div class="form-group">
                        <label>焦点色</label>
                        <input class="form-control" type="color" style="width: 200px;" name="hovercolor" id="hovercolor" required="" value="<?= $hovercolor ?>">
                    </div>
                  
                    <div><input type="submit" class="btn btn-success btn-sm mx-2" value="提交"></div>
                </div>
            </form>
        </div>
    </div>
    <script>
        setTimeout(hideActived, 3600);

        $("#menu_category_ext").addClass('active');

        $("#tips_form").submit(function (event) {
            event.preventDefault();
            submitForm("#tips_form");
        });
    </script>
<?php }

function plugin_setting() {
    $name = Input::postStrVar('name');
    $backgroundcolor = Input::postStrVar('backgroundcolor');
    $hovercolor = Input::postStrVar('hovercolor');

    $plugin_storage = Storage::getInstance('hc_backtotop');
    $plugin_storage->setValue('name', $name);
    $plugin_storage->setValue('backgroundcolor', $backgroundcolor);
    $plugin_storage->setValue('hovercolor', $hovercolor);
    Output::ok();
}
