import{h as fe,j as n,s as B,B as ee,_ as i,i as X,k as L,l as te,m as re,T as D,r as m,n as A,o as xe,p as j,q as O,v as oe,w as se,x as ge,y as ne,z as he,A as ye,C as q,D as ve,E as ae,G as be,H as U,I as V,J as F,K as Ce,N as we,O as J,P as Ie,Q as ke,f as K,R as $e,U as Re,V as Be,b as ie,W as G,X as Pe,Y as Te,Z as je,$ as Se}from"./index-4a6c57f8.js";import{l as N,g as Ee,L as Le}from"./ListItem-9e1e77c3.js";import{L as Me}from"./Link-962ef62e.js";const De=fe(n.jsx("path",{d:"M6 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm12 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-6 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"}),"MoreHoriz"),Ne=["slots","slotProps"],Ae=B(ee)(({theme:e})=>i({display:"flex",marginLeft:`calc(${e.spacing(1)} * 0.5)`,marginRight:`calc(${e.spacing(1)} * 0.5)`},e.palette.mode==="light"?{backgroundColor:e.palette.grey[100],color:e.palette.grey[700]}:{backgroundColor:e.palette.grey[700],color:e.palette.grey[100]},{borderRadius:2,"&:hover, &:focus":i({},e.palette.mode==="light"?{backgroundColor:e.palette.grey[200]}:{backgroundColor:e.palette.grey[600]}),"&:active":i({boxShadow:e.shadows[0]},e.palette.mode==="light"?{backgroundColor:X(e.palette.grey[200],.12)}:{backgroundColor:X(e.palette.grey[600],.12)})})),Oe=B(De)({width:24,height:16});function ze(e){const{slots:t={},slotProps:o={}}=e,r=L(e,Ne),s=e;return n.jsx("li",{children:n.jsx(Ae,i({focusRipple:!0},r,{ownerState:s,children:n.jsx(Oe,i({as:t.CollapsedIcon,ownerState:s},o.collapsedIcon))}))})}function We(e){return re("MuiBreadcrumbs",e)}const Ve=te("MuiBreadcrumbs",["root","ol","li","separator"]),_e=Ve,Ue=["children","className","component","slots","slotProps","expandText","itemsAfterCollapse","itemsBeforeCollapse","maxItems","separator"],Fe=e=>{const{classes:t}=e;return O({root:["root"],li:["li"],ol:["ol"],separator:["separator"]},We,t)},Ge=B(D,{name:"MuiBreadcrumbs",slot:"Root",overridesResolver:(e,t)=>[{[`& .${_e.li}`]:t.li},t.root]})({}),He=B("ol",{name:"MuiBreadcrumbs",slot:"Ol",overridesResolver:(e,t)=>t.ol})({display:"flex",flexWrap:"wrap",alignItems:"center",padding:0,margin:0,listStyle:"none"}),Ye=B("li",{name:"MuiBreadcrumbs",slot:"Separator",overridesResolver:(e,t)=>t.separator})({display:"flex",userSelect:"none",marginLeft:8,marginRight:8});function Xe(e,t,o,r){return e.reduce((s,d,a)=>(a<e.length-1?s=s.concat(d,n.jsx(Ye,{"aria-hidden":!0,className:t,ownerState:r,children:o},`separator-${a}`)):s.push(d),s),[])}const qe=m.forwardRef(function(t,o){const r=A({props:t,name:"MuiBreadcrumbs"}),{children:s,className:d,component:a="nav",slots:u={},slotProps:p={},expandText:l="Show path",itemsAfterCollapse:g=1,itemsBeforeCollapse:I=1,maxItems:v=8,separator:k="/"}=r,x=L(r,Ue),[h,$]=m.useState(!1),y=i({},r,{component:a,expanded:h,expandText:l,itemsAfterCollapse:g,itemsBeforeCollapse:I,maxItems:v,separator:k}),R=Fe(y),C=xe({elementType:u.CollapsedIcon,externalSlotProps:p.collapsedIcon,ownerState:y}),P=m.useRef(null),S=f=>{const M=()=>{$(!0);const b=P.current.querySelector("a[href],button,[tabindex]");b&&b.focus()};return I+g>=f.length?f:[...f.slice(0,I),n.jsx(ze,{"aria-label":l,slots:{CollapsedIcon:u.CollapsedIcon},slotProps:{collapsedIcon:C},onClick:M},"ellipsis"),...f.slice(f.length-g,f.length)]},E=m.Children.toArray(s).filter(f=>m.isValidElement(f)).map((f,M)=>n.jsx("li",{className:R.li,children:f},`child-${M}`));return n.jsx(Ge,i({ref:o,component:a,color:"text.secondary",className:j(R.root,d),ownerState:y},x,{children:n.jsx(He,{className:R.ol,ref:P,ownerState:y,children:Xe(h||v&&E.length<=v?E:S(E),R.separator,k,y)})}))}),Je=qe,Ke=["addEndListener","appear","children","container","direction","easing","in","onEnter","onEntered","onEntering","onExit","onExited","onExiting","style","timeout","TransitionComponent"];function Qe(e,t,o){const r=t.getBoundingClientRect(),s=o&&o.getBoundingClientRect(),d=ne(t);let a;if(t.fakeTransform)a=t.fakeTransform;else{const l=d.getComputedStyle(t);a=l.getPropertyValue("-webkit-transform")||l.getPropertyValue("transform")}let u=0,p=0;if(a&&a!=="none"&&typeof a=="string"){const l=a.split("(")[1].split(")")[0].split(",");u=parseInt(l[4],10),p=parseInt(l[5],10)}return e==="left"?s?`translateX(${s.right+u-r.left}px)`:`translateX(${d.innerWidth+u-r.left}px)`:e==="right"?s?`translateX(-${r.right-s.left-u}px)`:`translateX(-${r.left+r.width-u}px)`:e==="up"?s?`translateY(${s.bottom+p-r.top}px)`:`translateY(${d.innerHeight+p-r.top}px)`:s?`translateY(-${r.top-s.top+r.height-p}px)`:`translateY(-${r.top+r.height-p}px)`}function Ze(e){return typeof e=="function"?e():e}function _(e,t,o){const r=Ze(o),s=Qe(e,t,r);s&&(t.style.webkitTransform=s,t.style.transform=s)}const et=m.forwardRef(function(t,o){const r=oe(),s={enter:r.transitions.easing.easeOut,exit:r.transitions.easing.sharp},d={enter:r.transitions.duration.enteringScreen,exit:r.transitions.duration.leavingScreen},{addEndListener:a,appear:u=!0,children:p,container:l,direction:g="down",easing:I=s,in:v,onEnter:k,onEntered:x,onEntering:h,onExit:$,onExited:y,onExiting:R,style:C,timeout:P=d,TransitionComponent:S=he}=t,E=L(t,Ke),f=m.useRef(null),M=se(p.ref,f,o),b=c=>w=>{c&&(w===void 0?c(f.current):c(f.current,w))},T=b((c,w)=>{_(g,c,l),ye(c),k&&k(c,w)}),z=b((c,w)=>{const Y=q({timeout:P,style:C,easing:I},{mode:"enter"});c.style.webkitTransition=r.transitions.create("-webkit-transform",i({},Y)),c.style.transition=r.transitions.create("transform",i({},Y)),c.style.webkitTransform="none",c.style.transform="none",h&&h(c,w)}),W=b(x),de=b(R),pe=b(c=>{const w=q({timeout:P,style:C,easing:I},{mode:"exit"});c.style.webkitTransition=r.transitions.create("-webkit-transform",w),c.style.transition=r.transitions.create("transform",w),_(g,c,l),$&&$(c)}),ue=b(c=>{c.style.webkitTransition="",c.style.transition="",y&&y(c)}),me=c=>{a&&a(f.current,c)},H=m.useCallback(()=>{f.current&&_(g,f.current,l)},[g,l]);return m.useEffect(()=>{if(v||g==="down"||g==="right")return;const c=ge(()=>{f.current&&_(g,f.current,l)}),w=ne(f.current);return w.addEventListener("resize",c),()=>{c.clear(),w.removeEventListener("resize",c)}},[g,v,l]),m.useEffect(()=>{v||H()},[v,H]),n.jsx(S,i({nodeRef:f,onEnter:T,onEntered:W,onEntering:z,onExit:pe,onExited:ue,onExiting:de,addEndListener:me,appear:u,in:v,timeout:P},E,{children:(c,w)=>m.cloneElement(p,i({ref:M,style:i({visibility:c==="exited"&&!v?"hidden":void 0},C,p.props.style)},w))}))}),tt=et;function rt(e){return re("MuiDrawer",e)}te("MuiDrawer",["root","docked","paper","paperAnchorLeft","paperAnchorRight","paperAnchorTop","paperAnchorBottom","paperAnchorDockedLeft","paperAnchorDockedRight","paperAnchorDockedTop","paperAnchorDockedBottom","modal"]);const ot=["BackdropProps"],st=["anchor","BackdropProps","children","className","elevation","hideBackdrop","ModalProps","onClose","open","PaperProps","SlideProps","TransitionComponent","transitionDuration","variant"],le=(e,t)=>{const{ownerState:o}=e;return[t.root,(o.variant==="permanent"||o.variant==="persistent")&&t.docked,t.modal]},nt=e=>{const{classes:t,anchor:o,variant:r}=e,s={root:["root"],docked:[(r==="permanent"||r==="persistent")&&"docked"],modal:["modal"],paper:["paper",`paperAnchor${U(o)}`,r!=="temporary"&&`paperAnchorDocked${U(o)}`]};return O(s,rt,t)},at=B(ve,{name:"MuiDrawer",slot:"Root",overridesResolver:le})(({theme:e})=>({zIndex:(e.vars||e).zIndex.drawer})),Q=B("div",{shouldForwardProp:ae,name:"MuiDrawer",slot:"Docked",skipVariantsResolver:!1,overridesResolver:le})({flex:"0 0 auto"}),it=B(be,{name:"MuiDrawer",slot:"Paper",overridesResolver:(e,t)=>{const{ownerState:o}=e;return[t.paper,t[`paperAnchor${U(o.anchor)}`],o.variant!=="temporary"&&t[`paperAnchorDocked${U(o.anchor)}`]]}})(({theme:e,ownerState:t})=>i({overflowY:"auto",display:"flex",flexDirection:"column",height:"100%",flex:"1 0 auto",zIndex:(e.vars||e).zIndex.drawer,WebkitOverflowScrolling:"touch",position:"fixed",top:0,outline:0},t.anchor==="left"&&{left:0},t.anchor==="top"&&{top:0,left:0,right:0,height:"auto",maxHeight:"100%"},t.anchor==="right"&&{right:0},t.anchor==="bottom"&&{top:"auto",left:0,bottom:0,right:0,height:"auto",maxHeight:"100%"},t.anchor==="left"&&t.variant!=="temporary"&&{borderRight:`1px solid ${(e.vars||e).palette.divider}`},t.anchor==="top"&&t.variant!=="temporary"&&{borderBottom:`1px solid ${(e.vars||e).palette.divider}`},t.anchor==="right"&&t.variant!=="temporary"&&{borderLeft:`1px solid ${(e.vars||e).palette.divider}`},t.anchor==="bottom"&&t.variant!=="temporary"&&{borderTop:`1px solid ${(e.vars||e).palette.divider}`})),ce={left:"right",right:"left",top:"down",bottom:"up"};function lt(e){return["left","right"].indexOf(e)!==-1}function ct(e,t){return e.direction==="rtl"&&lt(t)?ce[t]:t}const dt=m.forwardRef(function(t,o){const r=A({props:t,name:"MuiDrawer"}),s=oe(),d={enter:s.transitions.duration.enteringScreen,exit:s.transitions.duration.leavingScreen},{anchor:a="left",BackdropProps:u,children:p,className:l,elevation:g=16,hideBackdrop:I=!1,ModalProps:{BackdropProps:v}={},onClose:k,open:x=!1,PaperProps:h={},SlideProps:$,TransitionComponent:y=tt,transitionDuration:R=d,variant:C="temporary"}=r,P=L(r.ModalProps,ot),S=L(r,st),E=m.useRef(!1);m.useEffect(()=>{E.current=!0},[]);const f=ct(s,a),b=i({},r,{anchor:a,elevation:g,open:x,variant:C},S),T=nt(b),z=n.jsx(it,i({elevation:C==="temporary"?g:0,square:!0},h,{className:j(T.paper,h.className),ownerState:b,children:p}));if(C==="permanent")return n.jsx(Q,i({className:j(T.root,T.docked,l),ownerState:b,ref:o},S,{children:z}));const W=n.jsx(y,i({in:x,direction:ce[f],timeout:R,appear:E.current},$,{children:z}));return C==="persistent"?n.jsx(Q,i({className:j(T.root,T.docked,l),ownerState:b,ref:o},S,{children:W})):n.jsx(at,i({BackdropProps:i({},u,v,{transitionDuration:R}),className:j(T.root,T.modal,l),open:x,ownerState:b,onClose:k,hideBackdrop:I,ref:o},S,P,{children:W}))}),Z=dt,pt=["alignItems","autoFocus","component","children","dense","disableGutters","divider","focusVisibleClassName","selected","className"],ut=(e,t)=>{const{ownerState:o}=e;return[t.root,o.dense&&t.dense,o.alignItems==="flex-start"&&t.alignItemsFlexStart,o.divider&&t.divider,!o.disableGutters&&t.gutters]},mt=e=>{const{alignItems:t,classes:o,dense:r,disabled:s,disableGutters:d,divider:a,selected:u}=e,l=O({root:["root",r&&"dense",!d&&"gutters",a&&"divider",s&&"disabled",t==="flex-start"&&"alignItemsFlexStart",u&&"selected"]},Ee,o);return i({},o,l)},ft=B(ee,{shouldForwardProp:e=>ae(e)||e==="classes",name:"MuiListItemButton",slot:"Root",overridesResolver:ut})(({theme:e,ownerState:t})=>i({display:"flex",flexGrow:1,justifyContent:"flex-start",alignItems:"center",position:"relative",textDecoration:"none",minWidth:0,boxSizing:"border-box",textAlign:"left",paddingTop:8,paddingBottom:8,transition:e.transitions.create("background-color",{duration:e.transitions.duration.shortest}),"&:hover":{textDecoration:"none",backgroundColor:(e.vars||e).palette.action.hover,"@media (hover: none)":{backgroundColor:"transparent"}},[`&.${N.selected}`]:{backgroundColor:e.vars?`rgba(${e.vars.palette.primary.mainChannel} / ${e.vars.palette.action.selectedOpacity})`:V(e.palette.primary.main,e.palette.action.selectedOpacity),[`&.${N.focusVisible}`]:{backgroundColor:e.vars?`rgba(${e.vars.palette.primary.mainChannel} / calc(${e.vars.palette.action.selectedOpacity} + ${e.vars.palette.action.focusOpacity}))`:V(e.palette.primary.main,e.palette.action.selectedOpacity+e.palette.action.focusOpacity)}},[`&.${N.selected}:hover`]:{backgroundColor:e.vars?`rgba(${e.vars.palette.primary.mainChannel} / calc(${e.vars.palette.action.selectedOpacity} + ${e.vars.palette.action.hoverOpacity}))`:V(e.palette.primary.main,e.palette.action.selectedOpacity+e.palette.action.hoverOpacity),"@media (hover: none)":{backgroundColor:e.vars?`rgba(${e.vars.palette.primary.mainChannel} / ${e.vars.palette.action.selectedOpacity})`:V(e.palette.primary.main,e.palette.action.selectedOpacity)}},[`&.${N.focusVisible}`]:{backgroundColor:(e.vars||e).palette.action.focus},[`&.${N.disabled}`]:{opacity:(e.vars||e).palette.action.disabledOpacity}},t.divider&&{borderBottom:`1px solid ${(e.vars||e).palette.divider}`,backgroundClip:"padding-box"},t.alignItems==="flex-start"&&{alignItems:"flex-start"},!t.disableGutters&&{paddingLeft:16,paddingRight:16},t.dense&&{paddingTop:4,paddingBottom:4})),xt=m.forwardRef(function(t,o){const r=A({props:t,name:"MuiListItemButton"}),{alignItems:s="center",autoFocus:d=!1,component:a="div",children:u,dense:p=!1,disableGutters:l=!1,divider:g=!1,focusVisibleClassName:I,selected:v=!1,className:k}=r,x=L(r,pt),h=m.useContext(F),$=m.useMemo(()=>({dense:p||h.dense||!1,alignItems:s,disableGutters:l}),[s,h.dense,p,l]),y=m.useRef(null);Ce(()=>{d&&y.current&&y.current.focus()},[d]);const R=i({},r,{alignItems:s,dense:$.dense,disableGutters:l,divider:g,selected:v}),C=mt(R),P=se(y,o);return n.jsx(F.Provider,{value:$,children:n.jsx(ft,i({ref:P,href:x.href||x.to,component:(x.href||x.to)&&a==="div"?"button":a,focusVisibleClassName:j(C.focusVisible,I),ownerState:R,className:j(C.root,k)},x,{classes:C,children:u}))})}),gt=xt,ht=["className"],yt=e=>{const{alignItems:t,classes:o}=e;return O({root:["root",t==="flex-start"&&"alignItemsFlexStart"]},we,o)},vt=B("div",{name:"MuiListItemIcon",slot:"Root",overridesResolver:(e,t)=>{const{ownerState:o}=e;return[t.root,o.alignItems==="flex-start"&&t.alignItemsFlexStart]}})(({theme:e,ownerState:t})=>i({minWidth:56,color:(e.vars||e).palette.action.active,flexShrink:0,display:"inline-flex"},t.alignItems==="flex-start"&&{marginTop:8})),bt=m.forwardRef(function(t,o){const r=A({props:t,name:"MuiListItemIcon"}),{className:s}=r,d=L(r,ht),a=m.useContext(F),u=i({},r,{alignItems:a.alignItems}),p=yt(u);return n.jsx(vt,i({className:j(p.root,s),ownerState:u,ref:o},d))}),Ct=bt,wt=["children","className","disableTypography","inset","primary","primaryTypographyProps","secondary","secondaryTypographyProps"],It=e=>{const{classes:t,inset:o,primary:r,secondary:s,dense:d}=e;return O({root:["root",o&&"inset",d&&"dense",r&&s&&"multiline"],primary:["primary"],secondary:["secondary"]},Ie,t)},kt=B("div",{name:"MuiListItemText",slot:"Root",overridesResolver:(e,t)=>{const{ownerState:o}=e;return[{[`& .${J.primary}`]:t.primary},{[`& .${J.secondary}`]:t.secondary},t.root,o.inset&&t.inset,o.primary&&o.secondary&&t.multiline,o.dense&&t.dense]}})(({ownerState:e})=>i({flex:"1 1 auto",minWidth:0,marginTop:4,marginBottom:4},e.primary&&e.secondary&&{marginTop:6,marginBottom:6},e.inset&&{paddingLeft:56})),$t=m.forwardRef(function(t,o){const r=A({props:t,name:"MuiListItemText"}),{children:s,className:d,disableTypography:a=!1,inset:u=!1,primary:p,primaryTypographyProps:l,secondary:g,secondaryTypographyProps:I}=r,v=L(r,wt),{dense:k}=m.useContext(F);let x=p??s,h=g;const $=i({},r,{disableTypography:a,inset:u,primary:!!x,secondary:!!h,dense:k}),y=It($);return x!=null&&x.type!==D&&!a&&(x=n.jsx(D,i({variant:k?"body2":"body1",className:y.primary,component:l!=null&&l.variant?void 0:"span",display:"block"},l,{children:x}))),h!=null&&h.type!==D&&!a&&(h=n.jsx(D,i({variant:"body2",className:y.secondary,color:"text.secondary",display:"block"},I,{children:h}))),n.jsxs(kt,i({className:j(y.root,d),ownerState:$,ref:o},v,{children:[x,h]}))}),Rt=$t,Bt=e=>{const{drawerWidth:t}=e,[o,r]=m.useState(!1),s=ke();K("category"),K("tag");const d=p=>{s(p)},a=()=>{r(!o)},u=n.jsxs(n.Fragment,{children:[n.jsx($e,{}),n.jsx(Re,{children:Be.map(p=>{const l=p.icon;return n.jsx(Le,{disablePadding:!0,children:n.jsxs(gt,{onClick:()=>d(p.title),children:[n.jsx(Ct,{children:n.jsx(l,{})}),n.jsx(Rt,{primary:ie(p.title)})]})},p.title)})})]});return n.jsxs(G,{sx:{width:{sm:t},flexShrink:{sm:0}},children:[n.jsx(Z,{variant:"temporary",open:o,onClose:a,ModalProps:{keepMounted:!0},sx:{display:{xs:"block",sm:"none"},"& .MuiDrawer-paper":{boxSizing:"border-box",width:t}},children:u}),n.jsx(Z,{variant:"permanent",sx:{display:{xs:"none",sm:"block"},"& .MuiDrawer-paper":{width:t}},open:!0,children:u})]})},Pt=m.memo(Bt),Tt=()=>{const t=Pe().pathname.split("/").filter(o=>o);return n.jsx(Je,{children:t.map((o,r)=>{const s=r===t.length-1,d=`/${t.slice(0,r+1).join("/")}`,a=ie(t.slice(r,r+1)[0]);return s?n.jsx(D,{color:"text.primary",children:a},d):n.jsx(Me,{component:Te,underline:"hover",color:"inherit",to:d,children:a},d)})})},Lt=()=>n.jsx(je,{children:n.jsxs(G,{sx:{display:"flex"},children:[n.jsx(Pt,{drawerWidth:240}),n.jsxs(G,{component:"main",sx:{flexGrow:1,p:3,width:{sm:"calc(100% - 240px)"}},children:[n.jsx(Tt,{}),n.jsx(Se,{})]})]})});export{Lt as default};
