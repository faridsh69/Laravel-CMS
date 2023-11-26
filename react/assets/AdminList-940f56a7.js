import{h as E,j as a,r as g,m as B,l as H,s as R,_ as p,n as A,k as I,p as j,q as N,H as L,a0 as Pe,I as K,a1 as Se,v as je,a2 as D,R as $e,S as Me,M as ke,a3 as Y,a4 as Ie,a5 as Le,B as Be,W as J,a6 as ve,a7 as fe,G as He,u as Ae,Q as Ne,e as _e,f as ze,a8 as De,Y as Ue}from"./index-8a380633.js";import{C as ye}from"./Checkbox-b0642053.js";const Fe={border:0,clip:"rect(0 0 0 0)",height:"1px",margin:-1,overflow:"hidden",padding:0,position:"absolute",whiteSpace:"nowrap",width:"1px"},qe=Fe,Z=E(a.jsx("path",{d:"M18.41 16.59L13.82 12l4.59-4.59L17 6l-6 6 6 6zM6 6h2v12H6z"}),"FirstPage"),ee=E(a.jsx("path",{d:"M5.59 7.41L10.18 12l-4.59 4.59L7 18l6-6-6-6zM16 6h2v12h-2z"}),"LastPage"),Ee=g.createContext(),Ce=Ee;function Ke(e){return B("MuiTable",e)}H("MuiTable",["root","stickyHeader"]);const Oe=["className","component","padding","size","stickyHeader"],We=e=>{const{classes:t,stickyHeader:o}=e;return N({root:["root",o&&"stickyHeader"]},Ke,t)},Ve=R("table",{name:"MuiTable",slot:"Root",overridesResolver:(e,t)=>{const{ownerState:o}=e;return[t.root,o.stickyHeader&&t.stickyHeader]}})(({theme:e,ownerState:t})=>p({display:"table",width:"100%",borderCollapse:"collapse",borderSpacing:0,"& caption":p({},e.typography.body2,{padding:e.spacing(2),color:(e.vars||e).palette.text.secondary,textAlign:"left",captionSide:"bottom"})},t.stickyHeader&&{borderCollapse:"separate"})),te="table",Ge=g.forwardRef(function(t,o){const s=A({props:t,name:"MuiTable"}),{className:r,component:n=te,padding:d="normal",size:c="medium",stickyHeader:l=!1}=s,i=I(s,Oe),b=p({},s,{component:n,padding:d,size:c,stickyHeader:l}),v=We(b),m=g.useMemo(()=>({padding:d,size:c,stickyHeader:l}),[d,c,l]);return a.jsx(Ce.Provider,{value:m,children:a.jsx(Ve,p({as:n,role:n===te?null:"table",ref:o,className:j(v.root,r),ownerState:b},i))})}),Je=Ge,Qe=g.createContext(),O=Qe;function Xe(e){return B("MuiTableBody",e)}H("MuiTableBody",["root"]);const Ye=["className","component"],Ze=e=>{const{classes:t}=e;return N({root:["root"]},Xe,t)},et=R("tbody",{name:"MuiTableBody",slot:"Root",overridesResolver:(e,t)=>t.root})({display:"table-row-group"}),tt={variant:"body"},oe="tbody",ot=g.forwardRef(function(t,o){const s=A({props:t,name:"MuiTableBody"}),{className:r,component:n=oe}=s,d=I(s,Ye),c=p({},s,{component:n}),l=Ze(c);return a.jsx(O.Provider,{value:tt,children:a.jsx(et,p({className:j(l.root,r),as:n,ref:o,role:n===oe?null:"rowgroup",ownerState:c},d))})}),at=ot;function st(e){return B("MuiTableCell",e)}const nt=H("MuiTableCell",["root","head","body","footer","sizeSmall","sizeMedium","paddingCheckbox","paddingNone","alignLeft","alignCenter","alignRight","alignJustify","stickyHeader"]),lt=nt,rt=["align","className","component","padding","scope","size","sortDirection","variant"],it=e=>{const{classes:t,variant:o,align:s,padding:r,size:n,stickyHeader:d}=e,c={root:["root",o,d&&"stickyHeader",s!=="inherit"&&`align${L(s)}`,r!=="normal"&&`padding${L(r)}`,`size${L(n)}`]};return N(c,st,t)},ct=R("td",{name:"MuiTableCell",slot:"Root",overridesResolver:(e,t)=>{const{ownerState:o}=e;return[t.root,t[o.variant],t[`size${L(o.size)}`],o.padding!=="normal"&&t[`padding${L(o.padding)}`],o.align!=="inherit"&&t[`align${L(o.align)}`],o.stickyHeader&&t.stickyHeader]}})(({theme:e,ownerState:t})=>p({},e.typography.body2,{display:"table-cell",verticalAlign:"inherit",borderBottom:e.vars?`1px solid ${e.vars.palette.TableCell.border}`:`1px solid
    ${e.palette.mode==="light"?Pe(K(e.palette.divider,1),.88):Se(K(e.palette.divider,1),.68)}`,textAlign:"left",padding:16},t.variant==="head"&&{color:(e.vars||e).palette.text.primary,lineHeight:e.typography.pxToRem(24),fontWeight:e.typography.fontWeightMedium},t.variant==="body"&&{color:(e.vars||e).palette.text.primary},t.variant==="footer"&&{color:(e.vars||e).palette.text.secondary,lineHeight:e.typography.pxToRem(21),fontSize:e.typography.pxToRem(12)},t.size==="small"&&{padding:"6px 16px",[`&.${lt.paddingCheckbox}`]:{width:24,padding:"0 12px 0 16px","& > *":{padding:0}}},t.padding==="checkbox"&&{width:48,padding:"0 0 0 4px"},t.padding==="none"&&{padding:0},t.align==="left"&&{textAlign:"left"},t.align==="center"&&{textAlign:"center"},t.align==="right"&&{textAlign:"right",flexDirection:"row-reverse"},t.align==="justify"&&{textAlign:"justify"},t.stickyHeader&&{position:"sticky",top:0,zIndex:2,backgroundColor:(e.vars||e).palette.background.default})),dt=g.forwardRef(function(t,o){const s=A({props:t,name:"MuiTableCell"}),{align:r="inherit",className:n,component:d,padding:c,scope:l,size:i,sortDirection:b,variant:v}=s,m=I(s,rt),x=g.useContext(Ce),h=g.useContext(O),$=h&&h.variant==="head";let T;d?T=d:T=$?"th":"td";let f=l;T==="td"?f=void 0:!f&&$&&(f="col");const y=v||h&&h.variant,w=p({},s,{align:r,component:T,padding:c||(x&&x.padding?x.padding:"normal"),size:i||(x&&x.size?x.size:"medium"),sortDirection:b,stickyHeader:y==="head"&&x&&x.stickyHeader,variant:y}),U=it(w);let z=null;return b&&(z=b==="asc"?"ascending":"descending"),a.jsx(ct,p({as:T,ref:o,className:j(U.root,n),"aria-sort":z,scope:f,ownerState:w},m))}),k=dt;function pt(e){return B("MuiTableContainer",e)}H("MuiTableContainer",["root"]);const ut=["className","component"],bt=e=>{const{classes:t}=e;return N({root:["root"]},pt,t)},gt=R("div",{name:"MuiTableContainer",slot:"Root",overridesResolver:(e,t)=>t.root})({width:"100%",overflowX:"auto"}),ht=g.forwardRef(function(t,o){const s=A({props:t,name:"MuiTableContainer"}),{className:r,component:n="div"}=s,d=I(s,ut),c=p({},s,{component:n}),l=bt(c);return a.jsx(gt,p({ref:o,as:n,className:j(l.root,r),ownerState:c},d))}),mt=ht;function xt(e){return B("MuiTableHead",e)}H("MuiTableHead",["root"]);const vt=["className","component"],ft=e=>{const{classes:t}=e;return N({root:["root"]},xt,t)},yt=R("thead",{name:"MuiTableHead",slot:"Root",overridesResolver:(e,t)=>t.root})({display:"table-header-group"}),Ct={variant:"head"},ae="thead",Tt=g.forwardRef(function(t,o){const s=A({props:t,name:"MuiTableHead"}),{className:r,component:n=ae}=s,d=I(s,vt),c=p({},s,{component:n}),l=ft(c);return a.jsx(O.Provider,{value:Ct,children:a.jsx(yt,p({as:n,className:j(l.root,r),ref:o,role:n===ae?null:"rowgroup",ownerState:c},d))})}),Rt=Tt,se=E(a.jsx("path",{d:"M15.41 16.09l-4.58-4.59 4.58-4.59L14 5.5l-6 6 6 6z"}),"KeyboardArrowLeft"),ne=E(a.jsx("path",{d:"M8.59 16.34l4.58-4.59-4.58-4.59L10 5.75l6 6-6 6z"}),"KeyboardArrowRight");var le,re,ie,ce,de,pe,ue,be;const wt=["backIconButtonProps","count","getItemAriaLabel","nextIconButtonProps","onPageChange","page","rowsPerPage","showFirstButton","showLastButton"],Pt=g.forwardRef(function(t,o){const{backIconButtonProps:s,count:r,getItemAriaLabel:n,nextIconButtonProps:d,onPageChange:c,page:l,rowsPerPage:i,showFirstButton:b,showLastButton:v}=t,m=I(t,wt),x=je(),h=y=>{c(y,0)},$=y=>{c(y,l-1)},T=y=>{c(y,l+1)},f=y=>{c(y,Math.max(0,Math.ceil(r/i)-1))};return a.jsxs("div",p({ref:o},m,{children:[b&&a.jsx(D,{onClick:h,disabled:l===0,"aria-label":n("first",l),title:n("first",l),children:x.direction==="rtl"?le||(le=a.jsx(ee,{})):re||(re=a.jsx(Z,{}))}),a.jsx(D,p({onClick:$,disabled:l===0,color:"inherit","aria-label":n("previous",l),title:n("previous",l)},s,{children:x.direction==="rtl"?ie||(ie=a.jsx(ne,{})):ce||(ce=a.jsx(se,{}))})),a.jsx(D,p({onClick:T,disabled:r!==-1?l>=Math.ceil(r/i)-1:!1,color:"inherit","aria-label":n("next",l),title:n("next",l)},d,{children:x.direction==="rtl"?de||(de=a.jsx(se,{})):pe||(pe=a.jsx(ne,{}))})),v&&a.jsx(D,{onClick:f,disabled:l>=Math.ceil(r/i)-1,"aria-label":n("last",l),title:n("last",l),children:x.direction==="rtl"?ue||(ue=a.jsx(Z,{})):be||(be=a.jsx(ee,{}))})]}))}),St=Pt;function jt(e){return B("MuiTablePagination",e)}const $t=H("MuiTablePagination",["root","toolbar","spacer","selectLabel","selectRoot","select","selectIcon","input","menuItem","displayedRows","actions"]),q=$t;var ge;const Mt=["ActionsComponent","backIconButtonProps","className","colSpan","component","count","getItemAriaLabel","labelDisplayedRows","labelRowsPerPage","nextIconButtonProps","onPageChange","onRowsPerPageChange","page","rowsPerPage","rowsPerPageOptions","SelectProps","showFirstButton","showLastButton"],kt=R(k,{name:"MuiTablePagination",slot:"Root",overridesResolver:(e,t)=>t.root})(({theme:e})=>({overflow:"auto",color:(e.vars||e).palette.text.primary,fontSize:e.typography.pxToRem(14),"&:last-child":{padding:0}})),It=R($e,{name:"MuiTablePagination",slot:"Toolbar",overridesResolver:(e,t)=>p({[`& .${q.actions}`]:t.actions},t.toolbar)})(({theme:e})=>({minHeight:52,paddingRight:2,[`${e.breakpoints.up("xs")} and (orientation: landscape)`]:{minHeight:52},[e.breakpoints.up("sm")]:{minHeight:52,paddingRight:2},[`& .${q.actions}`]:{flexShrink:0,marginLeft:20}})),Lt=R("div",{name:"MuiTablePagination",slot:"Spacer",overridesResolver:(e,t)=>t.spacer})({flex:"1 1 100%"}),Bt=R("p",{name:"MuiTablePagination",slot:"SelectLabel",overridesResolver:(e,t)=>t.selectLabel})(({theme:e})=>p({},e.typography.body2,{flexShrink:0})),Ht=R(Me,{name:"MuiTablePagination",slot:"Select",overridesResolver:(e,t)=>p({[`& .${q.selectIcon}`]:t.selectIcon,[`& .${q.select}`]:t.select},t.input,t.selectRoot)})({color:"inherit",fontSize:"inherit",flexShrink:0,marginRight:32,marginLeft:8,[`& .${q.select}`]:{paddingLeft:8,paddingRight:24,textAlign:"right",textAlignLast:"right"}}),At=R(ke,{name:"MuiTablePagination",slot:"MenuItem",overridesResolver:(e,t)=>t.menuItem})({}),Nt=R("p",{name:"MuiTablePagination",slot:"DisplayedRows",overridesResolver:(e,t)=>t.displayedRows})(({theme:e})=>p({},e.typography.body2,{flexShrink:0}));function _t({from:e,to:t,count:o}){return`${e}–${t} of ${o!==-1?o:`more than ${t}`}`}function zt(e){return`Go to ${e} page`}const Dt=e=>{const{classes:t}=e;return N({root:["root"],toolbar:["toolbar"],spacer:["spacer"],selectLabel:["selectLabel"],select:["select"],input:["input"],selectIcon:["selectIcon"],menuItem:["menuItem"],displayedRows:["displayedRows"],actions:["actions"]},jt,t)},Ut=g.forwardRef(function(t,o){const s=A({props:t,name:"MuiTablePagination"}),{ActionsComponent:r=St,backIconButtonProps:n,className:d,colSpan:c,component:l=k,count:i,getItemAriaLabel:b=zt,labelDisplayedRows:v=_t,labelRowsPerPage:m="Rows per page:",nextIconButtonProps:x,onPageChange:h,onRowsPerPageChange:$,page:T,rowsPerPage:f,rowsPerPageOptions:y=[10,25,50,100],SelectProps:w={},showFirstButton:U=!1,showLastButton:z=!1}=s,W=I(s,Mt),F=s,u=Dt(F),P=w.native?"option":At;let C;(l===k||l==="td")&&(C=c||1e3);const S=Y(w.id),_=Y(w.labelId),we=()=>i===-1?(T+1)*f:f===-1?i:Math.min(i,(T+1)*f);return a.jsx(kt,p({colSpan:C,ref:o,as:l,ownerState:F,className:j(u.root,d)},W,{children:a.jsxs(It,{className:u.toolbar,children:[a.jsx(Lt,{className:u.spacer}),y.length>1&&a.jsx(Bt,{className:u.selectLabel,id:_,children:m}),y.length>1&&a.jsx(Ht,p({variant:"standard"},!w.variant&&{input:ge||(ge=a.jsx(Ie,{}))},{value:f,onChange:$,id:S,labelId:_},w,{classes:p({},w.classes,{root:j(u.input,u.selectRoot,(w.classes||{}).root),select:j(u.select,(w.classes||{}).select),icon:j(u.selectIcon,(w.classes||{}).icon)}),children:y.map(M=>g.createElement(P,p({},!Le(P)&&{ownerState:F},{className:u.menuItem,key:M.label?M.label:M,value:M.value?M.value:M}),M.label?M.label:M))})),a.jsx(Nt,{className:u.displayedRows,children:v({from:i===0?0:T*f+1,to:we(),count:i===-1?-1:i,page:T})}),a.jsx(r,{className:u.actions,backIconButtonProps:n,count:i,nextIconButtonProps:x,onPageChange:h,page:T,rowsPerPage:f,showFirstButton:U,showLastButton:z,getItemAriaLabel:b})]})}))}),Ft=Ut;function qt(e){return B("MuiTableRow",e)}const Et=H("MuiTableRow",["root","selected","hover","head","footer"]),he=Et,Kt=["className","component","hover","selected"],Ot=e=>{const{classes:t,selected:o,hover:s,head:r,footer:n}=e;return N({root:["root",o&&"selected",s&&"hover",r&&"head",n&&"footer"]},qt,t)},Wt=R("tr",{name:"MuiTableRow",slot:"Root",overridesResolver:(e,t)=>{const{ownerState:o}=e;return[t.root,o.head&&t.head,o.footer&&t.footer]}})(({theme:e})=>({color:"inherit",display:"table-row",verticalAlign:"middle",outline:0,[`&.${he.hover}:hover`]:{backgroundColor:(e.vars||e).palette.action.hover},[`&.${he.selected}`]:{backgroundColor:e.vars?`rgba(${e.vars.palette.primary.mainChannel} / ${e.vars.palette.action.selectedOpacity})`:K(e.palette.primary.main,e.palette.action.selectedOpacity),"&:hover":{backgroundColor:e.vars?`rgba(${e.vars.palette.primary.mainChannel} / calc(${e.vars.palette.action.selectedOpacity} + ${e.vars.palette.action.hoverOpacity}))`:K(e.palette.primary.main,e.palette.action.selectedOpacity+e.palette.action.hoverOpacity)}}})),me="tr",Vt=g.forwardRef(function(t,o){const s=A({props:t,name:"MuiTableRow"}),{className:r,component:n=me,hover:d=!1,selected:c=!1}=s,l=I(s,Kt),i=g.useContext(O),b=p({},s,{component:n,hover:d,selected:c,head:i&&i.variant==="head",footer:i&&i.variant==="footer"}),v=Ot(b);return a.jsx(Wt,p({as:n,ref:o,className:j(v.root,r),role:n===me?null:"row",ownerState:b},l))}),G=Vt,Gt=E(a.jsx("path",{d:"M20 12l-1.41-1.41L13 16.17V4h-2v12.17l-5.58-5.59L4 12l8 8 8-8z"}),"ArrowDownward");function Jt(e){return B("MuiTableSortLabel",e)}const Qt=H("MuiTableSortLabel",["root","active","icon","iconDirectionDesc","iconDirectionAsc"]),V=Qt,Xt=["active","children","className","direction","hideSortIcon","IconComponent"],Yt=e=>{const{classes:t,direction:o,active:s}=e,r={root:["root",s&&"active"],icon:["icon",`iconDirection${L(o)}`]};return N(r,Jt,t)},Zt=R(Be,{name:"MuiTableSortLabel",slot:"Root",overridesResolver:(e,t)=>{const{ownerState:o}=e;return[t.root,o.active&&t.active]}})(({theme:e})=>({cursor:"pointer",display:"inline-flex",justifyContent:"flex-start",flexDirection:"inherit",alignItems:"center","&:focus":{color:(e.vars||e).palette.text.secondary},"&:hover":{color:(e.vars||e).palette.text.secondary,[`& .${V.icon}`]:{opacity:.5}},[`&.${V.active}`]:{color:(e.vars||e).palette.text.primary,[`& .${V.icon}`]:{opacity:1,color:(e.vars||e).palette.text.secondary}}})),eo=R("span",{name:"MuiTableSortLabel",slot:"Icon",overridesResolver:(e,t)=>{const{ownerState:o}=e;return[t.icon,t[`iconDirection${L(o.direction)}`]]}})(({theme:e,ownerState:t})=>p({fontSize:18,marginRight:4,marginLeft:4,opacity:0,transition:e.transitions.create(["opacity","transform"],{duration:e.transitions.duration.shorter}),userSelect:"none"},t.direction==="desc"&&{transform:"rotate(0deg)"},t.direction==="asc"&&{transform:"rotate(180deg)"})),to=g.forwardRef(function(t,o){const s=A({props:t,name:"MuiTableSortLabel"}),{active:r=!1,children:n,className:d,direction:c="asc",hideSortIcon:l=!1,IconComponent:i=Gt}=s,b=I(s,Xt),v=p({},s,{active:r,direction:c,hideSortIcon:l,IconComponent:i}),m=Yt(v);return a.jsxs(Zt,p({className:j(m.root,d),component:"span",disableRipple:!0,ownerState:v,ref:o},b,{children:[n,l&&!r?null:a.jsx(eo,{as:i,className:j(m.icon),ownerState:v})]}))}),oo=to,ao=e=>{const{onSelectAllClick:t,order:o,orderBy:s,numSelected:r,rowCount:n,onRequestSort:d,headCells:c}=e,l=i=>b=>{d(b,i)};return a.jsx(Rt,{children:a.jsxs(G,{children:[a.jsx(k,{padding:"checkbox",children:a.jsx(ye,{color:"primary",indeterminate:r>0&&r<n,checked:n>0&&r===n,onChange:t,inputProps:{"aria-label":"select all desserts"}})}),c.map(i=>a.jsx(k,{align:i.numeric?"right":"left",padding:i.disablePadding?"none":"normal",sortDirection:s===i.id?o:!1,children:a.jsxs(oo,{active:s===i.id,direction:s===i.id?o:"asc",onClick:l(i.id),children:[i.label,s===i.id?a.jsx(J,{component:"span",sx:qe,children:o==="desc"?"sorted descending":"sorted ascending"}):null]})},i.id))]})})},so=(e,t)=>{const o=e.map((s,r)=>[s,r]);return o.sort((s,r)=>{const n=t(s[0],r[0]);return n!==0?n:s[1]-r[1]}),o.map(s=>s[0])},xe=(e,t,o)=>t[o]<e[o]?-1:t[o]>e[o]?1:0,no=(e,t)=>e==="desc"?(o,s)=>xe(o,s,t):(o,s)=>-xe(o,s,t);var Q={},lo=fe;Object.defineProperty(Q,"__esModule",{value:!0});var Te=Q.default=void 0,ro=lo(ve()),io=a,co=(0,ro.default)((0,io.jsx)("path",{d:"M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"}),"Delete");Te=Q.default=co;var X={},po=fe;Object.defineProperty(X,"__esModule",{value:!0});var Re=X.default=void 0,uo=po(ve()),bo=a,go=(0,uo.default)((0,bo.jsx)("path",{d:"M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34a.9959.9959 0 0 0-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"}),"Edit");Re=X.default=go;const ho=e=>{const{list:t,bodyCells:o,headCells:s,handleDelete:r,handleEdit:n}=e,[d,c]=g.useState("asc"),[l,i]=g.useState("calories"),[b,v]=g.useState(0),[m,x]=g.useState(10),[h,$]=g.useState([]),T=g.useMemo(()=>so(t,no(d,l)).slice(b*m,b*m+m),[d,l,b,m,t]),f=b>0?Math.max(0,(1+b)*m-t.length):0,y=u=>h.indexOf(u)!==-1,w=u=>{x(parseInt(u.target.value,10)),v(0)},U=(u,P)=>{v(P)},z=(u,P)=>{const C=h.indexOf(P);let S=[];C===-1?S=S.concat(h,P):C===0?S=S.concat(h.slice(1)):C===h.length-1?S=S.concat(h.slice(0,-1)):C>0&&(S=S.concat(h.slice(0,C),h.slice(C+1))),$(S)},W=u=>{if(u.target.checked){const P=t.map(C=>C.id);$(P);return}$([])},F=(u,P)=>{c(l===P&&d==="asc"?"desc":"asc"),i(P)};return a.jsx(J,{sx:{width:"100%"},children:a.jsxs(He,{sx:{width:"98%",ml:2},children:[a.jsx(mt,{children:a.jsxs(Je,{sx:{minWidth:750},"aria-labelledby":"tableTitle",size:"medium",children:[a.jsx(ao,{numSelected:h.length,order:d,orderBy:l,onSelectAllClick:W,onRequestSort:F,rowCount:t.length,headCells:s}),a.jsxs(at,{children:[T.map((u,P)=>{const C=y(u.id),S=`enhanced-table-checkbox-${P}`;return a.jsxs(G,{hover:!0,onClick:_=>z(_,u.id),role:"checkbox","aria-checked":C,tabIndex:-1,selected:C,sx:{cursor:"pointer"},children:[a.jsx(k,{padding:"checkbox",children:a.jsx(ye,{color:"primary",checked:C,inputProps:{"aria-labelledby":S}})}),o.map(_=>a.jsx(k,{align:"left",children:u[_.name]},_.name)),a.jsxs(k,{align:"right",children:[a.jsx(D,{onClick:()=>n(u.id),children:a.jsx(Re,{})}),a.jsx(D,{onClick:()=>r(u.id),children:a.jsx(Te,{})})]})]},u.id)}),f>0&&a.jsx(G,{style:{height:53*f},children:a.jsx(k,{colSpan:6})})]})]})}),a.jsx(Ft,{rowsPerPageOptions:[5,10,25],component:"div",count:t.length,rowsPerPage:m,page:b,onPageChange:U,onRowsPerPageChange:w})]})})},vo=()=>{const{t:e}=Ae(),t=Ne(),{model:o}=_e(),{list:s,deleteMutation:r}=ze(o),n=g.useCallback(i=>{r.mutate(i)},[r]),d=i=>t(`/admin/${o}/${i}/edit`),c=[{id:"id",numeric:!0,disablePadding:!0,label:"ID"},{id:"title",numeric:!1,label:"Title"},{id:"price",numeric:!0,label:"Price"},{id:"description",numeric:!1,label:"Food Content"},{id:"url",numeric:!1,label:"Url"},{id:"actions",numeric:!1,label:"Actions"}],l=[{name:"id"},{name:"title"},{name:"price"},{name:"description"},{name:"url"}];return a.jsxs(J,{children:[a.jsx(De,{component:Ue,to:`/admin/${o}/create`,children:e("Create New Record")}),a.jsx(ho,{list:s,headCells:c,bodyCells:l,handleDelete:n,handleEdit:d})]})};export{vo as default};
