import './App.css';
import { BrowserRouter, Switch, Route, Redirect } from 'react-router-dom';
import Login from './components/Login';
import Register from './components/Register';
import HeaderComponent from './components/Header';
import Home from './views/Home';


function App() {
  return (
    <>
    <BrowserRouter>
      <HeaderComponent/>
      <Switch>
        <Route exact path='/'>
          <Home/>
        </Route>
        <Route exact path='/Login'> 
          <Login />
        </Route>
        <Route exact path='/Register'>
          <Register />
        </Route>
      </Switch>
    </BrowserRouter>
    </>
  );
}

export default App;
