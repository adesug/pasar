<!-- <center><h1>UPDATE CHART DETAIL</h1></center> -->

<?=form_open("")?>
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-bordered ">
            <tbody> 
                
                <tr>
                    <td colspan="2" class="text-center bg-dark" style="color: white;"><b> UPDATE CHART DETAIL</b></td>
                </tr> 
              
                <tr>
                    <td>qty</td>
                    <td><input class="form-control" value="<?=$arrCart->qty?>" name="qty"></td>
                </tr>    
                <tr>
                    <td>total</td>
                    <td><input class="form-control" value="<?=$arrCart->total?>" name="total"></td>
                </tr>    
                <tr>
                    <td>unit</td>
                    <td><input class="form-control" value="<?=$arrCart->unit?>" name="unit"></td>
                </tr>
                <tr>
                    <td>price</td>
                    <td><input class="form-control" value="<?=$arrCart->price?>" name="price"></td>
                </tr>    
                <tr>
                    <td>priceTotal</td>
                    <td><input class="form-control" value="<?=$arrCart->priceTotal?>" name="priceTotal"></td>
                </tr>    

            </tbody>
        </table> 
    </div>
<!-- </div>
<div class="row">  -->
    <div class="col-md-12 ">
        <table class="table table-striped table-bordered">
            <tbody>
                <tr>
                    <td colspan="2" class="text-center bg-dark" style="color: white;"><b> UPDATE CHART REVISI</b></td>
                </tr>  
                <tr>
                    <td width="27%">revQty</td>
                    <td><input class="form-control" value="<?=($arrCart->revQty =='')?$arrCart->qty:$arrCart->revQty;?>" name="revQty"></td>
                </tr>   
                <tr>
                    <td>revTotal</td>
                    <td><input class="form-control" value="<?=($arrCart->revTotal=='')?$arrCart->total:$arrCart->revTotal;?>" name="revTotal"></td>
                </tr>    
                <tr>
                    <td>revUnit</td>
                    <td><input class="form-control" value="<?=($arrCart->revUnit=='')?$arrCart->unit:$arrCart->revUnit;?>" name="revUnit"></td>
                </tr>     
                <tr>
                    <td>revPrice</td>
                    <td><input class="form-control" value="<?=($arrCart->revPrice=='')?$arrCart->price:$arrCart->revPrice;?>" name="revPrice"></td>
                </tr>    
                <tr>
                    <td>revPriceTotal</td>
                    <td><input class="form-control" value="<?=($arrCart->revPriceTotal=='')?$arrCart->priceTotal:$arrCart->revPriceTotal;?>" name="revPriceTotal"></td>
                </tr>
            </tbody>    
        </table>
    </div>
<!-- </div>

<div class="row"> -->
    <div class="col-md-12">
        <table class="table table-striped table-bordered">
            <tbody> 
                <tr>
                    <td colspan="2" class="text-center bg-dark" style="color:  white;"><b></b> UPDATE ITEM</td>
                </tr>  
                <tr>
                    <td>item</td>
                    <td><input class="form-control" value="<?=$arrCart->item?>" name="item" readonly><a href="<?=base_url();?>item/detail/33333695" target="_blank" class="ml-2">View Detail Item</a></td>
                </tr>  
                <tr>
                    <td>qty</td>
                    <td><input class="form-control" value="<?=$arrCart->qty?>" name="qty"></td>
                </tr>    
                <tr>
                    <td>total</td>
                    <td><input class="form-control" value="<?=$arrCart->total?>" name="total"></td>
                </tr>    
                <tr>
                    <td>unit</td>
                    <td><input class="form-control" value="<?=$arrCart->unit?>" name="unit"></td>
                </tr>
                <tr>
                    <td>price</td>
                    <td><input class="form-control" value="<?=$arrCart->price?>" name="price"></td>
                </tr>    
                <tr>
                    <td>priceTotal</td>
                    <td><input class="form-control" value="<?=$arrCart->priceTotal?>" name="priceTotal"></td>
                </tr>    

            </tbody>
        </table>
    </div>
</div>


<button type="submit" value="submit" class="btn btn-success btn-lg mb-2">Update</button>

<?=form_close()?>

<br>


<a class="btn btn-secondary btn-sm float-right ml-2 btn-sm" href="<?=base_url();?>dashboard" >  DASHBOARD <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
<button class="btn btn-secondary btn-sm float-right btn-sm mb-3" onclick="window.history.back();"><i class="fa fa-arrow-left" aria-hidden="true"></i> BACK</button>



</table>