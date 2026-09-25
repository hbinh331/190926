<script>
    $(document).ready(function() {
        $("#{{formGridAddress['table_id']}}").UIBootgrid(
            {   search:'/api/gridexample/settings/search_item/',
                get:'/api/gridexample/settings/get_item/',
                set:'/api/gridexample/settings/set_item/',
                add:'/api/gridexample/settings/add_item/',
                del:'/api/gridexample/settings/del_item/',
                toggle:'/api/gridexample/settings/toggle_item/'
            }
        );

        $("#reconfigureAct").SimpleActionButton();
    });

</script>

<div class="content-box">
    {{ partial('layout_partials/base_bootgrid_table', formGridAddress) }}
</div>
{{ partial('layout_partials/base_apply_button', {'data_endpoint': '/api/gridexample/service/reconfigure'}) }}
{{ partial("layout_partials/base_dialog",['fields':formDialogAddress,'id':formGridAddress['edit_dialog_id'],'label':lang._('Edit address')])}}