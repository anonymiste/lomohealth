import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';

class RegisterChildScreen extends StatefulWidget {
  const RegisterChildScreen({super.key});
  @override State<RegisterChildScreen> createState() => _RegisterChildScreenState();
}

class _RegisterChildScreenState extends State<RegisterChildScreen> {
  final _formKey = GlobalKey<FormState>();
  final Map<String, dynamic> data = {
    'name': '', 'birth_date': '', 'gender': 'M', 'mother_name': '',
    'mother_phone': '', 'region': 'Lomé', 'health_center': 'CHU Tokoin', 'language': 'fr'
  };

  Future<void> submit() async {
    if (!_formKey.currentState!.validate()) return;

    final response = await http.post(
      Uri.parse('http://10.0.2.2:8000/api/register'), // ou ton URL Railway
      headers: {'Content-Type': 'application/json'},
      body: jsonEncode(data),
    );

    if (response.statusCode == 200) {
      final result = jsonDecode(response.body);
      ScaffoldMessenger.of(context).showSnackBar(
        SnackBar(content: Text('Enfant inscrit ! QR: ${result['qr_code']}')),
      );
      Navigator.pop(context);
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('Inscrire un enfant')),
      body: Padding(
        padding: const EdgeInsets.all(16),
        child: Form(
          key: _formKey,
          child: ListView(children: [
            TextFormField(decoration: const InputDecoration(labelText: 'Nom complet'), onChanged: (v) => data['name'] = v, validator: (v) => v!.isEmpty ? 'Obligatoire' : null),
            TextFormField(decoration: const InputDecoration(labelText: 'Date de naissance (YYYY-MM-DD)'), onChanged: (v) => data['birth_date'] = v),
            TextFormField(decoration: const InputDecoration(labelText: 'Téléphone mère'), onChanged: (v) => data['mother_phone'] = v),
            DropdownButtonFormField<String>(
              value: data['language'],
              items: const [
                DropdownMenuItem(value: 'fr', child: Text('Français')),
                DropdownMenuItem(value: 'ewe', child: Text('Ewe')),
                DropdownMenuItem(value: 'kabiye', child: Text('Kabiyé')),
              ],
              onChanged: (v) => setState(() => data['language'] = v!),
            ),
            const SizedBox(height: 30),
            ElevatedButton(onPressed: submit, child: const Text('Inscrire et générer QR')),
          ]),
        ),
      ),
    );
  }
}