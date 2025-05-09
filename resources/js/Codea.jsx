import React from 'react'
import { createRoot } from 'react-dom/client'

export const Codea = () => {
  return (
    <h1>! Hola soy isaias desde react</h1>
  )
}
if(document.getElementById('parte1')){
    createRoot(document.getElementById('parte1')).render(<Codea/>)

}
