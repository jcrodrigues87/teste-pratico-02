# Generated by Django 3.1.1 on 2020-09-30 22:36

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('profiles', '0009_auto_20200930_2234'),
    ]

    operations = [
        migrations.AlterField(
            model_name='profiles',
            name='cod',
            field=models.AutoField(primary_key=True, serialize=False),
        ),
    ]