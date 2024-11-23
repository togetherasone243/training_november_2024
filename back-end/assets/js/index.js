const right=document.getElementById('right')
const left=document.getElementById('left')
const leftContent=document.getElementById('leftContent')
const AfficherLeft  = document.getElementById('AfficherLeft')
let AfficherLeftStat=false
window.addEventListener('resize',()=>{
    // console.log('taille :',window.innerWidth > 775)
    console.log(AfficherLeftStat, ':false?')
    window.innerWidth > 775?
    (()=>{
        console.log('taille : sup',window.innerWidth > 775)
        AfficherLeftStat=false
        leftContent.style.display = 'block'
        left.style.width = 'auto'
        right.style.display='block'
        AfficherLeft.style.display='none'
    })():(()=>{
       
         AfficherLeftStat==false ?
        (()=>{
            AfficherLeft.style.display='block'
            right.style.display='block'
            right.style.width = '100%'
            leftContent.style.display = 'none'
            console.log('cas 1 left none ? :',leftContent.style.display)
        })():
        (()=>{
            AfficherLeftStat=true
            leftContent.style.display = 'block'
            right.style.display='none'
            // left.style.width = '100%'
            AfficherLeft.innerHTML= '<i class="bi bi-x-lg"></i>'

        console.log('cas 2 right none? :',right.style.display)})()
    })()
})
// Script au chargement de la page
window.addEventListener('load',()=>{
    window.innerWidth > 775?
    (()=>{
        console.log('taille : sup',window.innerWidth > 775)
        AfficherLeftStat=false
        leftContent.style.display = 'block'
        left.style.width = 'auto'
        right.style.display='block'
        AfficherLeft.style.display='none'
    })():(()=>{
            AfficherLeft.style.display='block'
            right.style.display='block'
            right.style.width = '100%'
            leftContent.style.display = 'none'
    })()
})
// 
AfficherLeft.addEventListener('click',()=>{
    
   
    leftContent.style.display == 'block' ?
     (()=>{
        AfficherLeftStat=false
        console.log(AfficherLeftStat, ':false? upd')
        right.style.display='block'
        right.style.width = '93%'
        leftContent.style.display = 'none'
        const left=document.getElementById('left')
        left.style.width = '7%'
        // AfficherLeft.innerHTML= '<div style="margin: 5px;" >Menu</div>'
        AfficherLeft.innerHTML= '<i class="bi bi-list"></i>'
    })()
    :
    (()=>{
        AfficherLeftStat=true
        leftContent.style.display = 'block'
        right.style.display='none'
        left.style.width = '100%'
        // AfficherLeft.innerHTML='<div style="margin: 5px;" >Fermer</div>'
         AfficherLeft.innerHTML='<i class="bi bi-x-lg"></i>'
    })()
})