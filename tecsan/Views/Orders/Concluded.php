<main class="content">
	<div class="container-fluid p-0">

		<div class="row mb-2 mb-xl-3">
			<div class="col-auto d-none d-sm-block">
				<h3><strong><a class="text-decoration-none" href="<?= BASE_URL . 'Orders/index' ?>">Pedidos</a></strong></h3>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-md-6">
								<h5 class="card-title mb-0">Realizados</h5>
							</div>
							

							<!-- MODAL CRIAR PEDIDOS -->
							<div class="modal fade" id="addOrders" tabindex="-1" role="dialog" aria-hidden="true"> 
								<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											Adicionar Pedido
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<form method="POST" action="<?= BASE_URL . 'Orders/createOrder' ?>">
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12 mb-3">
														<label for="params_description" class="form-label">Categoria do Produto</label>
														<div>
															<select class="form-select" aria-label="Default select example" name="id_category">
																<option value="" disabled selected>Selecione a categoria</option>
																<?php foreach ($category_list as $category) : ?>
																	<option value="<?= $category['id_category']; ?>"><?= $category['name_category']; ?></option>
																<?php endforeach; ?>
															</select>
														</div>
													</div>
													<div class="col-md-12 mb-3">
														<div class="form-group">
															<label for="params_name" class="form-label">Nome do Produto</label>
															<input type="text" class="form-control" name="name" id="params_name" placeholder="Digite o nome do produto" required>
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
															<label for="params_name" class="form-label">Preço do Produto</label>
															<input type="text" class="form-control" name="price" id="params_name" placeholder="Digite o preço do produto" required>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<label for="params_description" class="form-label">Descrição do Produto</label>
															<input type="text" class="form-control" name="description" id="params_description" placeholder="Digite uma descrição para o produto" value="" required>
														</div>
													</div>
												</div>
											</div>
											<div class="modal-footer d-flex justify-content-end">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
												<button type="submit" name="newproduct" class="btn btn-info">Adicionar Produto</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<!-- FIM MODAL CRIAR PRODUTOS -->

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
											<td><?= $order['total_price']; ?></td>
											<td><?= $order['unit_price']; ?></td>
											<td><?= $order['purchase_date']; ?></td>
											<td><?= $order['delivery_time']; ?></td>
											<td><?= $order['delivery_date']; ?></td>
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