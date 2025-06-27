<!DOCTYPE html>
<html>
<head>
    <title>{{$title}}</title>
</head>
<body>
    <div style="background: white; box-shadow: 0px 2px 20px rgba(1, 41, 112, 0.1); border : 1px solid #9FC8;border-radius : 5px;width : 400px;margin:auto;border-style:solid;border-width:thin;border-color:#dadce0;border-radius:8px;padding:40px 20px">
    	<div style="margin:auto;text-align: center; ">
    		<a href="{{\URL::to('/')}}">
		      <img style="width: 150px; height: 50px;" src="{{\URL::to('/')}}/assets/images/logo_madarom.png" alt="Madarom" />
		    </a>
		    <div style="padding-top: 15px;padding-bottom: 45px;border-bottom: 2px solid #dadce0;">
		    	
		    </div>
    	</div>
    	<div style="text-align: justify;padding : 20px; font-size: 16px;">
    		{!!i18n('email.bonjour')!!} {{$order->devis->user->name}} {{$order->devis->user->prenom}},
            <br>
            {!!i18n('email_new_order.order_soumis')!!}
            <br>
            {{$body}}
            <br>
            {!!i18n('email_new_order.consult_details')!!}
    	</div>

    	<div style="padding-top: 15px;padding-bottom: 45px;border-bottom: 2px solid #dadce0;text-align: center;">
	    	<a href="{{route('order.detail', ['id' => $order->id])}}" style="font-size: 20px;color: white;text-decoration: none;background: #B31205;padding: 10px;border-radius: 5px;font-weight: bold;">
	    		{!!i18n('email_new_order.view_order')!!}
	    	</a>
	    </div>
    </div>
</body>
</html>
