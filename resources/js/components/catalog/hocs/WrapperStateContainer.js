import React from 'react';
import {StateProvider} from "../../../store/store";


export const WrapperStateContainer = (props) => {

    const WrappedComponent = props.children;

    return class extends React.Component {

        constructor(props) {
            super(props)
            this.state = {
                loading: false
            }

        }

        render() {
            return <StateProvider {...props}>
                <WrappedComponent {...this.props} />
            </StateProvider>


        }
    }
};
