<!DOCTYPE html>
<html>
<head>
	<title>Invoice</title>
	<style type="text/css">
		table {
			border-collapse: collapse;
    		border-spacing: 0;
		}
		table.border tr th, table.border tr td {
			border: 1px solid #e0e0e0;
			padding: 5px 10px;
		}

		.bg-grey
		{
			background: #eee;
			padding: 10px;
		}
	</style>
</head>
<body>
	<div style="width: 30%; float: left;">
		<img src="{{ asset('upload/setting/'. get_setting('logo')) }}" style="height: 50px;float: left; margin-top: 30px;">
	</div>
	<div style="float: right; width: 40%;">
		<p>
			{{ get_setting('title') }}<br />
			{{ get_setting('address') }}
		</p>
	</div>
	<div style="clear: both"></div>
	<br />
	<div class="bg-grey">
		<h3>Invoice #{{ $data->invoice_number }}</h3>
		<p>Tanggal Invoice : {{ $data->date }}</p>
	</div>
	<br />
	<div style="width: 40%;">
		<h3>Ditagihkan Kepada</h3>
		<p>
			{{ $data->project->client->name }}<br />
			{{ $data->project->client->address }}
		</p>
	</div>
	<div>
		<table class="border" style="width: 100%;">
			<tr>
				<th style="background: #eee;">Deskripsi</th>
				<th style="width: 30%;background: #eee;">Total</th>
			</tr>
			<tr>
				<td>
					<p>
						{{ $data->payment_term }}<br />
						<span style="font-size: 14px;">
							{{ $data->project->project_category }}<br />
							{{ $data->project->name }}
						</span>
					</p>
				</td>
				<td>{{ format_idr($data->sub_total) }}</td>
			</tr>
			<tr>
				<th style="text-align: right;background: #eee;">
					Tax {{ $data->tax }}%
				</th>
				<th style="background: #eee;">{{ format_idr($data->tax_price) }}</th>
			</tr>
			<tr>
				<th style="text-align: right;background: #eee;">Total</th>
				<th style="background: #eee;">{{ format_idr($data->total) }}</th>
			</tr>
		</table>
	</div>
</body>
</html>