import React, {Component} from 'react';
import ReactDOM from "react-dom";
import VerticalTabs from "./TabsForm";
import {Checkbox} from "@material-ui/core";

export default class HideObject extends Component {
    constructor(props){

        super(props);
        this.state = {
            checked : this.props.checked !== ""
        }
    }

    updateState = (checked,id, path, target) => {
        fetch(path ,{
            method : "POST",
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            body: JSON.stringify({status: !checked ? 1 : 0, id : id})
        }).then( () => {
            $(target).parents('.choice').toggleClass('alert-info',1000);
            this.setState({
                checked : !checked
            })
        } );
    }


    render() {
        return (
            <div onClick={(evt) => this.updateState(this.state.checked, this.props.id, this.props.path, evt.target)} className="choice__best">
                <img src={this.props.image} alt="like"/>
                {this.state.checked ? 'скрыть объявление' : 'показать объявление'}
            </div>
        )
    }
}


const app = document.querySelectorAll('.hideObject');

if (app) {

    Array.from(app).forEach(a =>
        ReactDOM.render(
            <HideObject {...a.dataset} />,
            a
        )
    )


}
