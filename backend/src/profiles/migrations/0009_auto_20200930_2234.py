# Generated by Django 3.1.1 on 2020-09-30 22:34

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('profiles', '0008_auto_20200930_2022'),
    ]

    operations = [
        migrations.AlterField(
            model_name='profiles',
            name='email',
            field=models.EmailField(max_length=254),
        ),
    ]