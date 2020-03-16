<?php

namespace App\Mail;

use App\Orders;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\URL;

class OrderSuggest extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Orders $order)
    {
        $this->order = $order->toArray();
        $this->user = User::find($order->getAttribute('user_id'));
        $this->objectInfo = $order->leftJoin('objects','objects.id','=','orders.object_id')->where('orders.id', $order->getAttribute('id'))->get(['type', 'objects.id','city','string','house'])->toArray();
    }

    public function generateDate($dateVar) {
        $months = array( 'января' , 'февраля' , 'марта' , 'апреля' , 'мая' , 'июня' , 'июля' , 'августа' , 'сентября' , 'октября' , 'ноября' , 'декабря' );
        $date = Date::createFromTimestamp(strtotime($dateVar));
        $date = $date->day.' '.$months[$date->month - 1].' '.$date->year;
        return $date;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $types = [
            '1' => 'гостиницы по адресу '.$this->objectInfo[0]['city'].', '.$this->objectInfo[0]['string'].' '.$this->objectInfo[0]['house'],
            '2' => 'квартиры по адресу '.$this->objectInfo[0]['city'].', '.$this->objectInfo[0]['string'].' '.$this->objectInfo[0]['house'],
            '3' => 'дома по адресу '.$this->objectInfo[0]['city'].', '.$this->objectInfo[0]['string'].' '.$this->objectInfo[0]['house'],
            '4' => 'комнаты по адресу '.$this->objectInfo[0]['city'].', '.$this->objectInfo[0]['string'].' '.$this->objectInfo[0]['house']
        ];


        $dateFrom = $this->generateDate($this->order['date_from']);
        $dateTo = $this->generateDate($this->order['date_to']);
        return $this->view('email.order.suggestion')->with('date_from',$dateFrom )->with('date_to', $dateTo)
            ->with('name', $this->user->getAttribute('name'))->with('link', URL::to('/').'/objects/'.$this->objectInfo[0]['id'])
            ->with('object', $types[$this->objectInfo[0]['type']]);
    }
}
