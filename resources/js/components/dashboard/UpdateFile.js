import React, { useState } from 'react';
import ReactDOM from "react-dom";


export default function UpdateFile({path}) {

    const [currentPath, changePath] = useState(path);
    const sendFile = (evt) => {
        evt.preventDefault();
        let data = new FormData();
        data.append('photo', evt.target.files[0])
        fetch( '/user/avatar' ,{
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            body: data}).then(response => response.json()).then(obj =>  changePath(obj.path));
    }
    return (
        <div>
            <div className="setting__left">
                <div className="setting__photo">
                    <input accept={".png,.jpg,.jpeg"} onChange={sendFile} type="file" className="hidden" name={"photo"} style={{display:"none"}} id={"photo"}/>
                    <label className="setting__load" htmlFor={"photo"}>
                        Загрузить своё фото
                        <img className="img__setting" src={currentPath} alt="You"/>
                    </label>
                </div>
            </div>
        </div>

    );
};

var root = document.getElementById('fileForm');

if (root) {
    ReactDOM.render(
        <UpdateFile {...(root.dataset)} />,
        root
    );
}
