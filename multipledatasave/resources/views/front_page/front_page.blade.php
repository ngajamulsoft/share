<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <title>Multiple Data Save</title>
</head>
<body>
    <div class="container">
        <br/>
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{session::get('success')}}
        </div>
        @endif
        <form action="orders" method="POST">
            {{csrf_field()}}
            <section>
                <div class="panel panel-header">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="customer_name" class="form-control" placeholder="masukkan nama anda">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="customer_address" class="form-control" placeholder="masukkan alamat anda">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-footer">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product name</th>
                                <th>Brand</th>
                                <th>Quantity</th>
                                <th>Budget</th>
                                <th>Amount</th>
                                <th><a href="#" class="addRow"><i class="glyphicon glyphicon-plus"></i></a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="product_name[]" class="form-control" required=""></td>
                                <td><input type="text" name="brand[]" class="form-control" ></td>
                                <td><input type="text" name="quantity[]" class="form-control quantity" required=""></td>
                                
                                <td><input type="text" name="budget[]" class="form-control budget" ></td>
                                <td><input type="text" name="amount[]" class="form-control amount" ></td>
                                <td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td style="border:none"></td>
                                <td style="border:none"></td>
                                <td style="border:none"></td>
                                <td>Total</td>
                                <td><b class="total"></b></td>
                                <td><input type="submit" name="" class="btn btn-success" value="Submit"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </section>
        </form>

    </div>
    <script type="text/javascript">
        $('tbody').delegate('.quantity,.budget','keyup',function(){
            var tr=$(this).parent().parent();
            var quantity = tr.find('.quantity').val();
            var budget = tr.find('.budget').val();
            var amount = (quantity*budget);
            tr.find('.amount').val(amount);
            total();
        });

        function total(){
            var total=0;
            $('.amount').each(function(i,e){
                var amount=$(this).val()-0;
            total +=amount;
            });
            $('.total').html(total);
        }

        $('.addRow').on('click',function(){
            addRow();
        });
        function addRow()
        {
            var tr='<tr>'+'<td><input type="text" name="product_name[]" class="form-control" required=""></td>'+
            '<td><input type="text" name="brand[]" class="form-control" ></td>'+
            '<td><input type="text" name="quantity[]" class="form-control quantity" required=""></td>'+
            '<td><input type="text" name="budget[]" class="form-control budget" ></td>'+
            '<td><input type="text" name="amount[]" class="form-control amount" ></td>'+
            '<td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>'+
            '</tr>';
            $('tbody').append(tr);
        };
        $('.remove').live('click',function(){
            var last=$('tbody tr').length;
            if(last==1){
                alert("Isi minimal 1 data");
            }
            else{
                $(this).parent().parent().remove();
            }
        });
    </script>    
</body>
</html>