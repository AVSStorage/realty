import React, {Component, useState} from 'react';
import ReactDOM from 'react-dom';

export default class Login extends Component {
    constructor(props) {
        super(props)

        this.state = {
            password: true,
            auth: false
        }

        this.handleSubmit = this.handleSubmit.bind(this);
    }

    handleSubmit(evt) {
        evt.preventDefault();
        const data = new FormData(event.target);
        fetch('/login', {
            method: 'POST',
            body: data,
            headers : {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': csrf_token
            }
        }).then(response => response.json()).then((obj) => {
            if (obj.auth){
                window.location.href = '/';
                this.setState({'auth' : true});
            }  else {
                this.setState({'auth' : false});
            }
        } );
    }


    validatePassword = (evt)  => {
        (evt.target.value.length < 11 || evt.target.value.length > 6) ? this.setState({password : true}) : this.setState({password : false});
    }


    render() {

        return(
        <div>
            <div className="modal__inner">
                <div className="modal__logo">
                    <img src="/img/logo.png" alt="Logo"/>
                </div>
            </div>
            {  this.state.auth ? (
                <div className="d-block valid-feedback">
                   Успешно
                </div>
            ) : (
            <div className="d-block invalid-feedback">
               Ваши данные неверны.Попробуйте снова
            </div> )
            }
            <div className="modal__title">
                Укажите Ваши контакты
            </div>
            <form onSubmit={this.handleSubmit}>
                <div className="modal__form">
                    <div className="form__modal-inner">
                        <div className="form__box-modal">
                            <label>
                                <span className="fancy__span">Укажите Вашу почту</span>
                                <input name="email" className="fancy" type="text"
                                       placeholder="Ваша почта"/>
                            </label>
                            <label>
                                <span className="fancy__span">Укажите Ваш пароль</span>
                                <input name="password" className={ this.state.password ? "fancy" : "fancy invalid-feedback"} onInput={this.validatePassword} type="password"
                                       placeholder="Ваш пароль"/>
                                {  this.state.password === false &&
                                    <div className="d-block invalid-feedback">
                                        Введите пароль.
                                    </div>
                                }
                            </label>
                            <div className="col-md-6 offset-md-3">
                                <div className="form-check">
                                        <label className="form-check-label">
                                            <span className="fancy__span">Запомнить меня</span>
                                            <input className="form-check-input" type="checkbox"
                                                   name="remember" id="remember"/>
                                        </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="text-center">
                    <button disabled={!(this.state.password)} type="submit" className={!(this.state.password) ?"fancy__btn btn-secondary" : "fancy__btn" }>Продолжить</button>
                </div>
                <div className="fancy__remember">
                    Я согласен на обработку <span className="span__remember">персональных данных</span> и<br/>
                    принимаю условия <span className="span__remember">пользовательского соглашения</span>

                </div>

            </form>
        </div>
        )
    }


    }


    console.log( document.getElementById('login'));

    if (document.getElementById('login')) {
        ReactDOM.render(<Login/>, document.getElementById('login'));
    }
