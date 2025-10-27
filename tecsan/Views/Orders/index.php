<main class="content">
	<div class="container-fluid p-0">

		<div class="row mb-2 mb-xl-3">
			<div class="col-auto d-none d-sm-block">
				<h3><strong>Pedidos</strong></h3>
			</div>

			<div class="col-auto ms-auto text-end mt-n1">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
						<li class="breadcrumb-item"><a href="#">Em andamento</a></li>
						<li class="breadcrumb-item active" aria-current="page"><a href="<?= BASE_URL . 'Orders/ordersConcluded' ?>">Realizados</a></li>
					</ol>
				</nav>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-md-6">
								<h5 class="card-title mb-0">Pedidos</h5>
							</div>
							<div class="col-md-6 text-end">
								<a class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addOrders">Novo Pedido</a>
							</div>

							<!-- MODAL CRIAR PEDIDOS -->
							<div class="modal fade" id="addOrders" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											Adicionar Pedido
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<form method="POST" action="<?= BASE_URL . 'Orders/createOrders' ?>">
											<div class="modal-body">
												<div class="row">

													<div class="col-md-12 mb-3">
														<div class="form-group">
															<label for="params_name" class="form-label">Nome do Produto</label>
															<select class="form-select" aria-label="Default select example" name="id_product">
																<option value="" disabled selected>Selecione o fabricante</option>
																	<?php foreach ($products_list as $products) : ?>
																		<option value="<?= $products['id_product']; ?>"><?= $products['name_product']; ?></option>
																	<?php endforeach; ?>
															</select>
														</div>
													</div>
													<div class="col-md-12 mb-3">
														<label for="params_description" class="form-label">Fabricante do Produto</label>
														<div>
															<select class="form-select" aria-label="Default select example" name="id_maker">
																<option value="" disabled selected>Selecione o fabricante</option>
																<?php foreach ($makers_list as $maker) : ?>
																	<option value="<?= $maker['id_makers']; ?>"><?= $maker['name_maker']; ?></option>
																<?php endforeach; ?>
															</select>
														</div>
													</div>
													<div class="col-md-12 mb-3">
														<div class="form-group">
															<label for="params_name" class="form-label">Quantidade do Produto</label>
															<input type="text" class="form-control" name="quantity" id="params_name" placeholder="Digite a quantidade do produto" required>
														</div>
													</div>
													<div class="col-md-12 mb-3">
														<div class="form-group">
															<label for="params_name" class="form-label">Preço Total</label>
															<input type="text" class="form-control" name="total_price" id="params_name" placeholder="R$ 0,00" required>
														</div>
													</div>
													<div class="col-md-12 mb-3">
														<div class="form-group">
															<label for="params_name" class="form-label">Preço Unitário do Produto</label>
															<input type="text" class="form-control" name="unit_price" id="params_name" placeholder="R$ 0,00" required>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<label for="params_description" class="form-label">Data de compra</label>
															<input type="date" class="form-control" name="purchase_date" id="params_description" placeholder="" value="" required>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<label for="params_description" class="form-label">Prazo</label>
															<input type="date" class="form-control" name="delivery_time" id="params_description" placeholder="" value="" required>
														</div>
													</div>
													
												</div>
											</div>
											<div class="modal-footer d-flex justify-content-end">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
												<button type="submit" name="neworder" class="btn btn-info">Adicionar Pedido</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<!-- FIM MODAL CRIAR PEDIDOS -->

						</div>
						<hr>
					</div>
					<div class="card-body">

						<table id="datatables-reponsive" class="table dataTable no-footer dtr-inline table-hover" style="width: 100%;" role="grid" aria-describedby="datatables-reponsive_info">
							<thead>
								<tr>
									<th>Modelo</th>
									<th>Fabricante</th>
									<th>Quantidade</th>
									<th>Preço Total</th>
									<th>Preço Unitário</th>
									<th>Data de compra</th>
									<th>Prazo</th>
									<th>Data de entrega</th>
								</tr>
							</thead>
							<tbody>

								<?php if (isset($orders_list)) : ?>
									<?php foreach ($orders_list as $order) : ?>
										<tr>
											<td><?= $order['name_product']; ?></td>
											<td><?= $order['name_maker']; ?></td>
											<td><?= $order['quantity']; ?></td>
											<td>R$ <?= number_format($order['total_price'], 2, ',','.'); ?></td>
											<td>R$ <?= number_format($order['unit_price'], 2, ',','.'); ?></td>
											<td><?= date('d/m/Y',strtotime($order['purchase_date'])); ?></td>
											<td><?= date('d/m/Y',strtotime($order['delivery_time'])); ?></td>
											<td><?= date('d/m/Y',strtotime($order['delivery_date'])); ?></td>
										</tr>

									<?php endforeach; ?>
								<?php endif; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>


	</div>
</main>