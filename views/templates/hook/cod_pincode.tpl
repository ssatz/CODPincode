{capture name=path}{l s='COD Availability' mod='CODPincode'}{/capture}
<div id="codpincodecheck">	
    {include file="$tpl_dir/errors.tpl"}
    <form method="post" action="">
        <fieldset>
            <div id="pincode">
                <p class="text-capitalize"><i class="icon-briefcase"></i>Enter your pincode to know cash on delivery availability<p>
                <p class="text">

                    <input type="text" class="text input-small" style="border: 1px solid rgb(189, 194, 201);height: 33px" id="codpincode" name="codpincode" value="{if isset($smarty.post.code)}{$smarty.post.code|escape:'html':'UTF-8'|stripslashes}{/if}" />

                    <input type="submit" name="codcheck" value="{l s='send' mod='CODPincode'}" class="btn btn-success codpincode" />						
                </p>
            </div>
            <div class="alert alert-dismissible" role="alert" id="msg" style="display: none">
               <!-- <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>-->
                
            </div>
        </fieldset>
    </form>


</div>