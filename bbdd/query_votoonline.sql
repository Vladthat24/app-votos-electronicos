use dirislim_votoonline;

select * from tap_empleado order by id desc;

select count(*) from tap_empleado; 

ALTER TABLE `tap_empleado` ADD `codigovoto` TEXT NOT NULL AFTER `estado_voto`;

SELECT e.id as id,e.datos_completos as datos_completos,e.dni as dni,e.oficina as oficina,e.cargo as cargo,e.foto as foto,
              r.nombre as roles,e.usuario as usuario,e.password as password,
              e.estado as estado,e.ultimo_login as ultimo_login,e.fecha_registro as fecha_registro,e.estado_voto as estado_voto,e.estadopassword as estadopassword FROM tap_empleado e inner join tap_roles r
              on e.idroles=r.id  ORDER BY e.id DESC;
              
update tap_empleado set password='', estadopassword='' where id=1;
SELECT * FROM TAP_EMPLEADO WHERE usuario='08926101';


SELECT e.id as id,e.datos_completos as datos_completos,e.dni as dni,
            e.oficina as oficina,e.cargo as cargo,e.foto as foto,
            r.nombre as roles,e.usuario as usuario,e.password as password,
            e.estado as estado,e.ultimo_login as ultimo_login,e.fecha_registro as fecha_registro FROM tap_empleado e inner join tap_roles r
            on e.idroles=r.id WHERE e.estado_voto=0 ORDER BY e.id DESC;
       
       
            
SELECT e.id as id,e.datos_completos as datos_completos,e.dni as dni, e.oficina as oficina,e.cargo as cargo,
	e.foto as foto, r.nombre as roles,e.usuario as usuario,e.password as password,
	e.estado as estado,e.ultimo_login as ultimo_login,e.fecha_registro as fecha_registro 
FROM tap_empleado e 
	inner join tap_roles r 
	on e.idroles=r.id 
	WHERE e.estado_voto=0 
	and e.usuario!='vblanco'
	and r.nombre!='ADMINISTRADOR' 
ORDER BY e.id DESC;

SELECT 
	count(*)
FROM tap_empleado e 
	inner join tap_roles r 
	on e.idroles=r.id 
	WHERE e.estado_voto=0 
	and e.usuario!='vblanco'
	and r.nombre!='ADMINISTRADOR' 
ORDER BY e.id DESC;


select * from tap_empleado where estadopassword=1;
select * from tap_empleado where estadopassword=0;

select * from tap_empleado where dni in('10209736','06759817','08761359','08999784','06649785','07690159');

UPDATE tap_empleado set password='$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy' where idroles=1;




