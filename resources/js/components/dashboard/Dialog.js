import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import DialogCard from "./DialogCard";

export default class Dialog extends Component {
    constructor(props){
        super(props);
        this.state = {
            message: JSON.parse(this.props.messages).length > 0 ? JSON.parse(this.props.messages) : [
                {message:'Сообщение загружаются.....',
                info: [{
                    date_to:'',
                    date_from:'',
                    address:'',
                    status: '',
                    object_id:''
                }],
                photos: [{
                    name: ''
                }]}
            ]
        }
    }


    componentWillMount() {
       if (JSON.parse(this.props.messages).length === 0) {
           fetch('/dashboard/messages', {
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           }).then(response => response.json()).then((obj) => {
               console.log([...obj]);
               this.setState({message: [...obj]});
           })
       }

        Echo.private('chat')
            .listen('MessageSent', (e) => {

               let index =  this.state.message.findIndex((message) => message.id ===  e.dialog.id );
               let updateItem = this.state.message;
               updateItem[index] =   e.dialog;

                this.setState({message: updateItem})
            });
    }


    render() {


        return (
            <DialogCard messages={this.state.message ? this.state.message : 'аааааа'}/>
        )
    }
}

var root = document.getElementById('chatDialog');

if (root) {
    ReactDOM.render(
        <Dialog {...(root.dataset)} />,
        root
    );
}
