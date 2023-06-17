import { React, useRef } from 'react';
import {
  MDBBtn,
  MDBContainer,
  MDBCard,
  MDBCardBody,
  MDBInput,
  MDBCheckbox
}
from 'mdb-react-ui-kit';
import '../css/Signup.css';
import axiosClient from '../axios-client';
import { useStateContext } from '../context/ContextProvider';


function Signup() {
    const nameRef = useRef()
    const emailRef = useRef()
    const passwordRef = useRef()
    const pConfirmRef = useRef()

    // const getToken = async () => {
    //   await axiosClient.get('/sanctum/csrf-cookie');
    // }
    const {setUser, setToken} = useStateContext()

    const onSignup = async (e) => {
        e.preventDefault();
        const payload = {
            name: nameRef.current.value,
            email: emailRef.current.value,
            password: passwordRef.current.value,
            password_confirmation: pConfirmRef.current.value,
        }
        // await getToken();
        axiosClient.post('/signup', payload)
        .then(({data}) => {
            setUser(data.user)
            setToken(data.token)
        })
        .catch(err => {
            const response = err.response;
            if (response && response.status == 422) {
                console.log('Invalid input');
            } else {
              console.log(err);
            }
        })
    }
  return (
    <form onSubmit={onSignup}>
        <div className='d-flex align-items-center justify-content-center fade-in'>
      <div className='mask gradient-custom-3'></div>
      <MDBCard className='m-5'>
        <MDBCardBody className='px-5'>
          <h2 className="text-center mb-5">Create an account</h2>
          <MDBInput ref={nameRef} wrapperClass='mb-4' label='Your Name' size='lg' id='form1' type='text'/>
          <MDBInput ref={emailRef} wrapperClass='mb-4' label='Your Email' size='lg' id='form2' type='email'/>
          <MDBInput ref={passwordRef} wrapperClass='mb-4' label='Password' size='lg' id='form3' type='password'/>
          <MDBInput ref={pConfirmRef} wrapperClass='mb-4' label='Repeat your password' size='lg' id='form4' type='password'/>
          <div className='d-flex flex-row justify-content-center mb-4'>
            <MDBCheckbox name='flexCheck' id='flexCheckDefault' label='I agree all statements in Terms of service' />
          </div>
          <MDBBtn className='mb-4 w-100 gradient-custom-4' size='lg'>Register</MDBBtn>
        </MDBCardBody>
      </MDBCard>
      </div>
      </form>
  );
}

export default Signup;