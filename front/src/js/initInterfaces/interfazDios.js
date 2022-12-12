import '../../styles.scss';
import * as bootstrap from 'bootstrap';

import {fetchDestino} from '../http/httpProvider';
import {rellenarTablaCaracteristicas} from "../caracteristicas/caracteristicasComponentes";
import {rellenarModalCaracterísticas} from "../caracteristicas/caracteristicasComponentes";
import {pintarContDestino} from "../contDestino/destinoComponentes";

rellenarTablaCaracteristicas();
rellenarModalCaracterísticas();
pintarContDestino();

