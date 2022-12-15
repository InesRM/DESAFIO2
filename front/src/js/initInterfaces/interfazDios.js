import '../../styles.scss';
import * as bootstrap from 'bootstrap';

import {rellenarTablaCaracteristicas} from "../caracteristicas/caracteristicasComponentes";
import {rellenarModalCaracterísticas} from "../caracteristicas/caracteristicasComponentes";
import {pintarContDestino} from "../contDestino/destinoComponentes";
import { pintarDiosProtector } from '../contDestino/destinoComponentes';
rellenarTablaCaracteristicas();
rellenarModalCaracterísticas();
pintarContDestino();
pintarDiosProtector();

