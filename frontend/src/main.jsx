import { StrictMode } from 'react';
import { createRoot } from 'react-dom/client';
import { BrowserRouter, Routes, Route } from "react-router-dom";
import { Index } from './pages/Index.jsx';
import { Login } from './pages/Login.jsx';

createRoot(document.getElementById('root')).render(
  <StrictMode> 
    {/* Sua aplicação deve ser envolvida pelo StrictMode */}
    <BrowserRouter>
      <Routes>
        <Route path='/' element={<Index />} />
        <Route path='/login' element={<Login />} />
      </Routes>
    </BrowserRouter>
  </StrictMode> // Não se esqueça de fechar
);